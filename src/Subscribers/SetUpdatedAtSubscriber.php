<?php

namespace ZnCore\Entity\Subscribers;

use App\News\Domain\Entities\CommentEntity;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use ZnCore\Domain\Domain\Enums\EventEnum;
use ZnCore\Domain\Domain\Events\EntityEvent;

/**
 * @todo: перенести в отдельный пакет
 */
class SetUpdatedAtSubscriber implements EventSubscriberInterface
{

    public static function getSubscribedEvents()
    {
        return [
//            EventEnum::BEFORE_CREATE_ENTITY => 'onBeforePersist',
            EventEnum::BEFORE_UPDATE_ENTITY => 'onBeforePersist',
        ];
    }

    public function onBeforePersist(EntityEvent $event)
    {
        $entity = $event->getEntity();
        $entity->setUpdatedAt(new \DateTime());
    }
}
