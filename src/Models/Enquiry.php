<?php

namespace BasicFormApp\Models;

class Enquiry extends BaseModel
{
    protected $table = 'enquiries';
    const Type_of_Enquiry_General = 'General';
    const Type_of_Enquiry_General_Cast = 0;
    const Type_of_Enquiry_Regarding_An_Order = 'Regarding An Order';
    const Type_of_Enquiry_Regarding_An_Order_Cast = 1;
    const Enquiry_Types = [self::Type_of_Enquiry_General, self::Type_of_Enquiry_Regarding_An_Order];
    protected $id;
    protected $name;
    protected $email;
    protected $enquiry_type;
    protected $orderNumber;
    protected $message;

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
     * @param int $enquiry_type
     */
    public function setEnquiryType($enquiry_type)
    {
        if ($enquiry_type === self::Type_of_Enquiry_Regarding_An_Order) {
            $this->enquiry_type = self::Type_of_Enquiry_Regarding_An_Order_Cast;
        } else {
            $this->enquiry_type = self::Type_of_Enquiry_General_Cast;
        }
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
        if (! empty ($orderNumber)) {
            $this->orderNumber = $orderNumber;
        } else {
            $this->orderNumber = null;
        }
    }

    /**
     * @return string
     */
    public function getTableName()
    {
        return $this->table;
    }

    /**
     * @param array $data
     * @return Enquiry $this
     */
    public function setEnquiry($data)
    {
        $this->setName($data[ 'customer_name' ]);
        $this->setEmail($data[ 'email_address' ]);
        $this->setEnquiryType($data[ 'enquiry_type' ]);
        $this->setOrderNumber($data[ 'order_number' ]);
        $this->setMessage($data[ 'message' ]);

        return $this;
    }

    /**
     * @return array
     */
    public function getEnquiry()
    {
        return [
            'name' => $this->getName(),
            'email' => $this->getEmail(),
            'enquiry_type' => $this->getEnquiryType(),
            'order_number' => $this->getOrderNumber(),
            'message' => $this->getMessage()
        ];
    }
}
