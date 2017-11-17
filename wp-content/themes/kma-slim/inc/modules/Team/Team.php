<?php

namespace Includes\Modules\Team;

use Includes\Modules\CPT\CustomPostType;

class Team
{
    public function __construct()
    {
    }

    public function createPostType()
    {
        $team = new CustomPostType(
            'Team Member',
            [
                'supports'           => [ 'title', 'editor', 'author' ],
                'menu_icon'          => 'dashicons-businessman',
                'has_archive'        => false,
                'menu_position'      => null,
                'public'             => true,
                'publicly_queryable' => true,
                'hierarchical'       => true,
                'show_ui'            => true,
                'show_in_nav_menus'  => true,
                '_builtin'           => false,
                'rewrite'            => [
                    'slug'       => 'team',
                    'with_front' => true,
                    'feeds'      => true,
                    'pages'      => false
                ]
            ]
        );

        $team->addMetaBox(
            'Contact Info',
            [
                'Title'        => 'text',
                'Photo'        => 'image',
                'Email'        => 'text',
                'Phone'        => 'text',
            ]
        );
    }

    protected function getImageSizes( $url )
    {

        $imageSizes    = [];
        $images        = [];
        $dir           = wp_upload_dir();

        if (false !== strpos($url, $dir['baseurl'] . '/')) { // Is URL in uploads directory?
            $file = basename( $url );

            $query_args = array(
                'post_type'   => 'attachment',
                'post_status' => 'inherit',
                'fields'      => 'ids',
                'meta_query'  => array(
                    array(
                        'value'   => $file,
                        'compare' => 'LIKE',
                        'key'     => '_wp_attachment_metadata',
                    ),
                )
            );

            $query = new \WP_Query( $query_args );
            if ( $query->have_posts() ) {
                foreach ( $query->posts as $post_id ) {
                    $meta              = wp_get_attachment_metadata($post_id);
                    $originalFile      = basename($meta['file']);
                    $croppedImageFiles = wp_list_pluck($meta['sizes'], 'file');
                    if ($originalFile === $file || in_array($file, $croppedImageFiles)) {
                        $images = $croppedImageFiles;
                        $images['original'] = $originalFile;
                        break;
                    }
                }
            }
        }

        foreach ($images as $imageSize => $imageUrl){
            $imageSizes[$imageSize] = [
                'external_path' => $dir['baseurl'] . $dir['subdir'] . '/' . $imageUrl,
                'local_path'    => wp_normalize_path($dir['path'] . '/' . $imageUrl),
                'relative_path' => wp_normalize_path('/wp-content/uploads' . $dir['subdir'] . '/' . $imageUrl)
            ];
        }

        return $imageSizes;

    }

    /**
     * @return null
     */
    public function createAdminColumns()
    {
        add_filter(
            'manage_team_member_posts_columns',
            function ($defaults) {
                $defaults = [
                    'title'       => 'Name',
                    'wtitle'      => 'Title',
                    'email'       => 'Email Address',
                    'photo'       => 'Photo',
                    'date'        => 'Date'
                ];

                return $defaults;
            },
            0
        );

        add_action('manage_team_member_posts_custom_column', function ($column_name, $post_ID) {
            switch ($column_name) {
                case 'photo':
                    $photo = $this->getImageSizes(get_post_meta($post_ID, 'contact_info_photo', true));
                    echo(isset($photo['thumbnail']['relative_path']) ? '<img src ="' . $photo['thumbnail']['relative_path'] . '" class="img-fluid" style="width:150px; max-width:100%;" >' : null);
                    break;

                case 'email':
                    $object = get_post_meta($post_ID, 'contact_info_email', true);
                    echo(isset($object) ? '<a href="mailto:' . $object . '" >' . $object . '</a>' : null);
                    break;

                case 'wtitle':
                    $object = get_post_meta($post_ID, 'contact_info_title', true);
                    echo(isset($object) ? $object : null);
                    break;
            }
        }, 0, 2);
    }

    public function getTeam($args = [])
    {
        $request = [
            'post_type'      => 'team_member',
            'posts_per_page' => -1,
            'orderby'        => 'menu_order',
            'order'          => 'ASC',
            'offset'         => 0,
            'post_status'    => 'publish',
        ];

        $request = get_posts(array_merge($request, $args));

        $output = [];
        foreach ($request as $item) {
            array_push($output, [
                'id'    => (isset($item->ID) ? $item->ID : null),
                'name'  => $item->post_title,
                'bio'   => apply_filters('the_content', $item->post_content),
                'title' => (isset($item->contact_info_title) ? $item->contact_info_title : null),
                'email' => (isset($item->contact_info_email) ? $item->contact_info_email : null),
                'phone' => (isset($item->contact_info_phone) ? $item->contact_info_phone : null),
                'slug'  => (isset($item->post_name) ? $item->post_name : null),
                'photo' => (isset($item->contact_info_photo) ? $this->getImageSizes(get_post_meta($item->ID,
                    'contact_info_photo', true)) : null),
                'link'  => get_permalink($item->ID),
            ]);
        }

        return $output;
    }

    public function getSingle($name)
    {
        $output = $this->getTeam([
            'title'          => $name,
            'posts_per_page' => 1,
        ]);

        return $output[0];
    }

    public function getTeamNames()
    {
        $request = $this->getTeam([]);

        $output = [];
        foreach ($request as $item) {
            array_push($output, (isset($item->post_title) ? $item->post_title : null));
        }

        return $output;
    }
}
