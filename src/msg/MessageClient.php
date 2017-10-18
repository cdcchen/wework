<?php
/**
 * Created by PhpStorm.
 * User: chendong
 * Date: 2017/10/17
 * Time: 20:34
 */

namespace cdcchen\wework\msg;


use cdcchen\wework\base\BaseClient;

/**
 * Class MessageClient
 * @package cdcchen\wework\msg
 */
class MessageClient extends BaseClient
{
    /**
     * @param string $agentId
     * @param string $content
     * @param array|null $toUser
     * @param array|null $toDepart
     * @param array|null $toTag
     * @return mixed
     */
    public function sendText(
        string $agentId,
        string $content,
        array $toUser = null,
        array $toDepart = null,
        array $toTag = null
    ) {
        $message = (new TextMessage())->setContent($content);
        return $this->sendMessage($agentId, $message, $toUser, $toDepart, $toTag);
    }

    /**
     * @param string $agentId
     * @param string $mediaId
     * @param array|null $toUser
     * @param array|null $toDepart
     * @param array|null $toTag
     * @return mixed
     */
    public function sendImage(
        string $agentId,
        string $mediaId,
        array $toUser = null,
        array $toDepart = null,
        array $toTag = null
    ) {
        $message = (new ImageMessage())->setMediaId($mediaId);
        return $this->sendMessage($agentId, $message, $toUser, $toDepart, $toTag);
    }

    /**
     * @param string $agentId
     * @param string $mediaId
     * @param array|null $toUser
     * @param array|null $toDepart
     * @param array|null $toTag
     * @return mixed
     */
    public function sendVoice(
        string $agentId,
        string $mediaId,
        array $toUser = null,
        array $toDepart = null,
        array $toTag = null
    ) {
        $message = (new VoiceMessage())->setMediaId($mediaId);
        return $this->sendMessage($agentId, $message, $toUser, $toDepart, $toTag);
    }

    /**
     * @param string $agentId
     * @param string $mediaId
     * @param string|null $title
     * @param string|null $description
     * @param array|null $toUser
     * @param array|null $toDepart
     * @param array|null $toTag
     * @return mixed
     */
    public function sendVideo(
        string $agentId,
        string $mediaId,
        string $title = null,
        string $description = null,
        array $toUser = null,
        array $toDepart = null,
        array $toTag = null
    ) {
        $message = (new VideoMessage())->setVideo($mediaId, $title, $description);
        return $this->sendMessage($agentId, $message, $toUser, $toDepart, $toTag);
    }

    /**
     * @param string $agentId
     * @param string $mediaId
     * @param array|null $toUser
     * @param array|null $toDepart
     * @param array|null $toTag
     * @return mixed
     */
    public function sendFile(
        string $agentId,
        string $mediaId,
        array $toUser = null,
        array $toDepart = null,
        array $toTag = null
    ) {
        $message = (new FileMessage())->setMediaId($mediaId);
        return $this->sendMessage($agentId, $message, $toUser, $toDepart, $toTag);
    }

    /**
     * @param string $agentId
     * @param TextCard $card
     * @param array|null $toUser
     * @param array|null $toDepart
     * @param array|null $toTag
     * @return mixed
     */
    public function sendTextCard(
        string $agentId,
        TextCard $card,
        array $toUser = null,
        array $toDepart = null,
        array $toTag = null
    ) {
        $message = (new TextCardMessage())->setCard($card);
        return $this->sendMessage($agentId, $message, $toUser, $toDepart, $toTag);
    }

    /**
     * @param string $agentId
     * @param array $articles
     * @param array|null $toUser
     * @param array|null $toDepart
     * @param array|null $toTag
     * @return mixed
     */
    public function sendNews(
        string $agentId,
        array $articles,
        array $toUser = null,
        array $toDepart = null,
        array $toTag = null
    ) {
        $message = (new NewsMessage())->setArticles($articles);
        return $this->sendMessage($agentId, $message, $toUser, $toDepart, $toTag);
    }

    /**
     * @param string $agentId
     * @param array $articles
     * @param array|null $toUser
     * @param array|null $toDepart
     * @param array|null $toTag
     * @return mixed
     */
    public function sendMPNews(
        string $agentId,
        array $articles,
        array $toUser = null,
        array $toDepart = null,
        array $toTag = null
    ) {
        $message = (new MPNewsMessage())->setArticles($articles);
        return $this->sendMessage($agentId, $message, $toUser, $toDepart, $toTag);
    }

    /**
     * @param string $agentId
     * @param Message $message
     * @param array|null $toUser
     * @param array|null $toDepart
     * @param array|null $toTag
     * @return mixed
     */
    public function sendMessage(
        string $agentId,
        Message $message,
        array $toUser = null,
        array $toDepart = null,
        array $toTag = null
    ) {
        $message->setAgentId($agentId);
        if ($toUser !== null) {
            $message->setToUser($toUser);
        }
        if ($toDepart !== null) {
            $message->setToDepart($toDepart);
        }
        if ($toTag !== null) {
            $message->setToTag($toTag);
        }
        $request = (new SendMessageRequest())->setMessage($message);
        return $this->send($request);
    }
}