<?php

namespace App\Services;

use App\Models\Member;


class MemberService
{
    private $members_phone_number;

    public function __construct()
    {
        $this->members_phone_number = [];
        $this->members_phone_number = Member::all()->pluck('no_telpon');
    }

    public function is_no_telpon_exist($no_telpon)
    {
        return in_array($no_telpon);
    }

    public function get_members_phone_number()
    {
        return $this->members_phone_number;
    }
}
