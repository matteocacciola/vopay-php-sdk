<?php

namespace DataMat\VoPay\Models;

class Error
{
    private $errors = [
        900 => ['reason' => 'Edit Reject', 'description' => 'Bank account information cannot be validated.'],
        901 => [
            'reason' => 'NSF',
            'description' => 'Bank account does not have enough funds to complete the transaction.'
        ],
        902 => ['reason' => 'Cannot Trace', 'description' => 'The account cannot be located.'],
        903 => ['reason' => 'Payment Stopped/Recalled	The account holder has asked the bank to stop/recall the payment.'],
        904 => [
            'reason' => 'Post/Stale Dated',
            'description' => 'Considered stale-dated after six months. A stale-dated payment means that the item is old, and not necessarily invalid. Financial institutions may still honour these items, but there is no obligation to do so.'
        ],
        905 => [
            'reason' => 'Account Closed',
            'description' => 'This account is closed and cannot be debited/credited.'
        ],
        907 => ['reason' => 'No Debit Allowed', 'description' => 'This account does not allow debit transactions.'],
        908 => [
            'reason' => 'Funds Not Cleared',
            'description' => 'The payor/payee has made a credit payment to their account that has not cleared. The payee did not have enough clear funds in the account to cover the debit amount.'
        ],
        909 => [
            'reason' => 'Currency/Account Mismatch',
            'description' => 'The currency of the transaction does not match the currency of the account.'
        ],
        910 => [
            'reason' => 'Payor/Payee Deceased',
            'description' => 'The account may be closed or frozen due to a death.'
        ],
        911 => ['reason' => 'Account Frozen', 'description' => 'This account is not allowing any transactions.'],
        912 => [
            'reason' => 'Invalid/Incorrect Account No.',
            'description' => 'The account number is not correct or its invalid format.'
        ],
        914 => [
            'reason' => 'Incorrect Payor/Payee Name',
            'description' => 'The account payor/payee name does not match the transaction details.'
        ],
        915 => [
            'reason' => 'PAD No Agreement Existed – Business/Personal',
            'description' => 'Account holder has asked the financial institution to withhold payment.'
        ],
        916 => [
            'reason' => 'PAD Not In Accordance with Agreement - Personal',
            'description' => 'The payor has requested the debit to be returned as the debit has not been issued in accordance with the PAD agreement the customer signed.'
        ],
        917 => [
            'reason' => 'PAD Agreement Revoked - Personal',
            'description' => 'The payor has requested the debit to be returned as they have cancelled the PAD agreement authorizing the debit.'
        ],
        918 => [
            'reason' => 'PAD No Pre-Notification – Personal',
            'description' => 'Bank requires a pre-notification agreement and cannot allow payment.'
        ],
        919 => [
            'reason' => 'PAD Not In Accordance with Agreement – Business',
            'description' => 'The payor has requested the debit to be returned as the debit has not been issued in accordance with the PAD agreement the customer signed.'
        ],
        920 => [
            'reason' => 'PAD Agreement Revoked – Business',
            'description' => 'The payor has requested the debit to be returned as they have cancelled the PAD agreement authorizing the debit.'
        ],
        921 => [
            'reason' => 'PAD No Pre-Notification – Personal',
            'description' => 'The payor has requested the debit to be returned as they have did not receive pre-notification of a change to the PAD date or amount, or they did not receive written confirmation of a PAD Agreement executed by electronic means.'
        ],
        989 => ['reason' => 'Information not provided by the bank', 'description' => ''],
        990 => ['reason' => 'Institution in Default', 'description' => '']
    ];

    /**
     * @param int $code
     *
     * @return array|string[]
     */
    public function get(int $code) : array
    {
        return $this->errors[$code] ?? [];
    }

    /**
     * @param int $code
     *
     * @return string|null
     */
    public function getReason(int $code) : ?string
    {
        return $this->errors[$code]['reason'] ?? null;
    }

    public function getDescription(int $code) : ?string
    {
        return $this->errors[$code]['description'] ?? null;
    }
}
