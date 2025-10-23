<?php

namespace App\Schemas\WebPanel\Complaint;

use App\Commons\Libs\Http\BaseSchema;

class ComplaintConfirmationSchema extends BaseSchema
{
    private $status;
    private $reason;

    protected function rules()
    {
        return [
            'status' => 'required|In:approved,denied',
            'reason' => 'required_if:status,denied'
        ];
    }

    protected function messages()
    {
        return [
            'status.required' => 'kolom status wajib diisi',
            'status.in' => 'nilai kolom status tidak valid',
            'reason.required_if' => 'kolom alasan wajib diisi'
        ];
    }

    public function hydrateBody()
    {
        $status = $this->body['status'];
        $reason = !empty(trim($this->body['reason'] ?? '')) ? $this->body['reason'] : null;

        $this->setStatus($status)
            ->setReason($reason);
    }

    /**
     * Get the value of status
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Set the value of status
     *
     * @return  self
     */
    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * Get the value of reason
     */
    public function getReason()
    {
        return $this->reason;
    }

    /**
     * Set the value of reason
     *
     * @return  self
     */
    public function setReason($reason)
    {
        $this->reason = $reason;

        return $this;
    }
}
