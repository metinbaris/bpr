<?php

namespace BasicFormApp\Models;

class Enquiry extends BaseModel
{
    const Type_of_Enquiry_General = 'General';
    const Type_of_Enquiry_Regarding_An_Order = 'Regarding An Order';
    const Enquiry_Types = [self::Type_of_Enquiry_Regarding_An_Order, self::Type_of_Enquiry_General];
}