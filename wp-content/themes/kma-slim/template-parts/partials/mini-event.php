<?php

use Carbon\Carbon;

date_default_timezone_set('America/Chicago');

$content    = $event->message;
$start      = Carbon::parse($event->start_time);
$end        = isset($event->end_time) ? Carbon::parse($event->end_time) : null;
$eventTimes = $end != null ? $start->copy()->format('g:i A') . ' - '. $end->copy()->format('g:i A') : $start->copy()->format('g:i A');
$eventDates = $end != null && $end->diffInDays($start) > 1 ? $start->copy()->format('M d') . ' - '. $end->copy()->format('M d, Y') : $start->format('M d, Y');
?>
<div class="card mini-event">
    <div class="card-image">
        <figure class="image is-2by1">
            <a href="https://www.facebook.com/events/<?= $event->id; ?>" target="_blank">
                <img src="<?= $event->cover->source ?>" alt="<?php echo $event->caption; ?>" >
            </a>
        </figure>
    </div>
    <div class="card-content">
        <h3 class="title"><?= $event->name; ?></h3>
        <table class="event-table">
            <tr>
                <td class="date-block" >
                    <p class="month"><?= $start->copy()->format('M'); ?></p>
                    <p class="day"><?= $start->copy()->format('d'); ?></p>
                </td>
                <td>
                    <p class="time"><strong><?= $eventDates; ?> | <?= $eventTimes; ?></strong></p>
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
