<?php

namespace BasicFormApp\Models;

class Enquiry extends BaseModel
{
    protected $table = 'enquiries';
    const Type_of_Enquiry_General = 'General';
    const Type_of_Enquiry_Regarding_An_Order = 'Regarding An Order';
    const Enquiry_Types = [self::Type_of_Enquiry_Regarding_An_Order, self::Type_of_Enquiry_General];
    protected $id;
    protected $name;
    protected $email;
    protected $enquiry_type;
    protected $orderNumber;
    protected $message;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * @return mixed
     */
    public function getEnquiryType()
    {
        return $this->enquiry_type;
    }

    /**
     * @param mixed $enquiry_type
     */
    public function setEnquiryType($enquiry_type)
    {
        $this->enquiry_type = $enquiry_type;
    }

    /**
     * @return mixed
     */
    public function getMessage()
    {
        return $this->message;
    }

    /**
     * @param mixed $message
     */
    public function setMessage($message)
    {
        $this->message = $message;
    }

    /**
     * @return mixed
     */
    public function getOrderNumber()
    {
        return $this->orderNumber;
    }

    /**
     * @param mixed $orderNumber
     */
    public function setOrderNumber($orderNumber)
    {
        $this->orderNumber = $orderNumber;
    }

    /**
     * @return string
     */
    public function getTableName()
    {
        return $this->table;
    }
}
