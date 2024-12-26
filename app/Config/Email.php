<?php

namespace Config;

use CodeIgniter\Config\BaseConfig;

class Email extends BaseConfig
{
    // public string $fromEmail = 'info@arcturusconsultingservices.com';
    public string $fromName = 'Traveller Destination Inc.';
    public string $recipients = 'to@example.com';

    /**
     * The "user agent"
     */
    public string $userAgent = 'CodeIgniter';

    /**
     * The mail sending protocol: mail, sendmail, smtp
     */
    public string $protocol = 'smtp';

    /**
     * SMTP Server Address
     */
    public string $SMTPHost = '';

    /**
     * SMTP Username
     */
    public string $SMTPUser = '';

    /**
     * SMTP Password
     */
    public string $SMTPPass = '';

    /**
     * SMTP Port
     */
    public int $SMTPPort = 587;

    /**
     * SMTP Timeout (in seconds)
     */
    public int $SMTPTimeout = 5;

    /**
     * Enable persistent SMTP connections
     */
    public bool $SMTPKeepAlive = false;

    /**
     * SMTP Encryption.
     *
     * @var string '', 'tls' or 'ssl'. 'tls' will issue a STARTTLS command
     *             to the server. 'ssl' means implicit SSL. Connection on port
     *             465 should set this to ''.
     */
    public string $SMTPCrypto = 'tls'; // Update to 'ssl' for SSL connection

    /**
     * Enable word-wrap
     */
    public bool $wordWrap = true;

    // Other configurations...
    // SMTP_FromName = datahq
# SMTP_HOST=smtppro.zoho.in
# SMTP_USER=admin@datahq.in
# SMTP_PASS=Datahq@123
# SMTP_PORT=587
# SMTP_SECURE=tls
}
