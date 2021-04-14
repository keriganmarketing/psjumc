<?php

use Carbon\Carbon;

date_default_timezone_set('America/Chicago');

$content    = $event->post_content;
$start      = Carbon::parse($event->start_time);
$end        = isset($event->end_time) ? Carbon::parse($event->end_time) : null;
$eventTimes = $end != null ? $start->copy()->format('g:i A') . ' - '. $end->copy()->format('g:i A') : $start->copy()->format('g:i A');
$eventDates = $end != null && $end->diffInDays($start) > 1 ? $start->copy()->format('M d') . ' - '. $end->copy()->format('M d, Y') : $start->format('M d, Y');
?>
<div class="card mini-event">
    <div class="card-image">
        <figure class="image is-2by1" style="overflow: hidden;">
            <a href="https://www.facebook.com/events/<?= $event->post_title; ?>" target="_blank">
                <img src="<?= $event->full_image_url ?>" alt="<?php echo $econtent; ?>" style="height: auto !important;" >
            </a>
        </figure>
    </div>
    <div class="card-content">
        <h3 class="title"><?= $event->event_name; ?></h3>
        <p class="time"><strong><?= $eventDates; ?> | <?= $eventTimes; ?></strong></p>
        <p class="location"><?= $event->event_name; ?></p>
        <?= wp_trim_words( $content, $num_words = 22, '...' ); ?>
    </div>
    <div class="card-footer">
        <?php if($isFuture){ ?>
            <a class="card-footer-item is-primary" href="https://www.facebook.com/events/<?= $event->post_title; ?>">Read more & RSVP on Facebook</a>
        <?php } else { ?>
            <a class="card-footer-item is-primary" href="https://www.facebook.com/events/<?= $event->post_title; ?>">Read more on Facebook</a>
        <?php } ?>
    </div>
</div>

<!-- $post->event_name = get_post_meta($post->ID, 'event_name', true);
$post->post_link = get_post_meta($post->ID, 'post_link', true);
$post->where = get_post_meta($post->ID, 'where', false);
$post->full_image_url = get_post_meta($post->ID, 'full_image_url', true);
$post->start_time = get_post_meta($post->ID, 'start_time', true);
$post->end_time = get_post_meta($post->ID, 'end_time', true); -->
