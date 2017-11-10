<?php
date_default_timezone_set('America/Chicago');

$content    = $event->message;
$startTime  = date('g:i a', strtotime($event->start_time));
$endTime    = date('g:i a', strtotime($event->end_time));
$endYear    = date('Y', strtotime($event->end_time));
$startMonth = date('M', strtotime($event->start_time));
$endMonth   = date('M', strtotime($event->end_time));
$startDay   = date('d', strtotime($event->start_time));
$endDay     = date('j', strtotime($event->end_time));

$startDate  = date('M j', strtotime($event->start_time));
$endDate    = ($startMonth == $endMonth ? $endDay : $endMonth . ' ' . $endDay);

$eventDate  = ($startDate != $endDate ? $startDate . ' - ' . $endDate . ', ' . $endYear : $startDate . ', ' . $endYear);
$eventTime  = ($startTime != $endTime ? $startTime . ' - ' . $endTime : $startTime);
?>
<div class="card mini-event">
    <div class="card-image">
        <figure class="image is-2by1">
            <a href="https://www.facebook.com/events/<?= $event->id; ?>" target="_blank">
                <img src="https://bulma.io/images/placeholders/640x320.png" alt="<?php echo $event->caption; ?>" >
            </a>
        </figure>
    </div>
    <div class="card-content">
        <h3 class="title"><?= $event->name; ?></h3>
        <table class="event-table">
            <tr>
                <td class="date-block" >
                    <p class="month"><?= $startMonth; ?></p>
                    <p class="day"><?= $startDay; ?></p>
                </td>
                <td>
                    <p class="time"><strong><?= $eventDate; ?> | <?= $eventTime; ?></strong></p>
                    <p class="location"><?= $event->place->name; ?></p>
                </td>
            </tr>
        </table>
        <?= wp_trim_words( $event->description, $num_words = 22, '...' ); ?>
    </div>
    <div class="card-footer">
        <a class="card-footer-item is-primary" href="https://www.facebook.com/events/<?= $event->id; ?>">Read more & RSVP on Facebook</a>
    </div>
</div>
