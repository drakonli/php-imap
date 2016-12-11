<?php

namespace PhpImap\Mail\Service\Marker\Composed;

use PhpImap\Mail\Service\Marker\Answered\AnsweredMailMarkerInterface;
use PhpImap\Mail\Service\Marker\Deleted\DeletedMailMarkerInterface;
use PhpImap\Mail\Service\Marker\Drafted\DraftedMailMarkerInterface;
use PhpImap\Mail\Service\Marker\Flagged\FlaggedMailMarkerInterface;
use PhpImap\Mail\Service\Marker\Read\ReadMailMarkerInterface;

/**
 * @author    drakonli - Arthur Vinogradov - <artur.drakonli@gmail.com>
 * @link      www.linkedin.com/in/drakonli
 */
interface ComposedMailMarkerInterface extends
    AnsweredMailMarkerInterface,
    DraftedMailMarkerInterface,
    FlaggedMailMarkerInterface,
    DeletedMailMarkerInterface,
    ReadMailMarkerInterface
{

}
