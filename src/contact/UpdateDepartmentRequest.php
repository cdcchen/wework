<?php
/**
 * Created by PhpStorm.
 * User: chendong
 * Date: 2017/10/18
 * Time: 19:41
 */

namespace cdcchen\wework\contact;


use cdcchen\http\HttpResponse;
use cdcchen\wework\base\BaseRequest;
use Fig\Http\Message\RequestMethodInterface;

/**
 * Class UpdateDepartmentRequest
 * @package cdcchen\wework\contact
 */
class UpdateDepartmentRequest extends BaseRequest
{
    /**
     * @var string
     */
    protected $apiUri = 'https://qyapi.weixin.qq.com/cgi-bin/department/update';
    /**
     * @var string
     */
    protected $method = RequestMethodInterface::METHOD_POST;

    /**
     * @param int $id
     * @return static
     */
    public function setId(int $id): self
    {
        $this->bodyParams->set('id', $id);
        return $this;
    }

    /**
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->bodyParams->get('id');
    }

    /**
     * @param string $name
     * @return static
     */
    public function setName(string $name): self
    {
        $this->bodyParams->set('name', $name);
        return $this;
    }

    /**
     * @return string|null
     */
    public function getName(): ?string
    {
        return $this->bodyParams->get('name');
    }

    /**
     * @param int $id
     * @return static
     */
    public function setParentId(int $id): self
    {
        $this->bodyParams->set('parentid', $id);
        return $this;
    }

    /**
     * @return int|null
     */
    public function getParentId(): ?int
    {
        return $this->bodyParams->get('parentid');
    }

    /**
     * @param int $order
     * @return static
     */
    public function setOrder(int $order): self
    {
        $this->bodyParams->set('order', $order);
        return $this;
    }

    /**
     * @return int|null
     */
    public function getOrder(): ?int
    {
        return $this->bodyParams->get('order');
    }

    /**
     * @param HttpResponse $response
     * @return bool
     */
    protected function handleResponse(HttpResponse $response): bool
    {
        return true;
    }
}