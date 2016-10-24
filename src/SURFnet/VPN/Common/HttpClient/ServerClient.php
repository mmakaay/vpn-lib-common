<?php
/**
 *  Copyright (C) 2016 SURFnet.
 *
 *  This program is free software: you can redistribute it and/or modify
 *  it under the terms of the GNU Affero General Public License as
 *  published by the Free Software Foundation, either version 3 of the
 *  License, or (at your option) any later version.
 *
 *  This program is distributed in the hope that it will be useful,
 *  but WITHOUT ANY WARRANTY; without even the implied warranty of
 *  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *  GNU Affero General Public License for more details.
 *
 *  You should have received a copy of the GNU Affero General Public License
 *  along with this program.  If not, see <http://www.gnu.org/licenses/>.
 */
namespace SURFnet\VPN\Common\HttpClient;

class ServerClient extends BaseClient
{
    public function __construct(HttpClientInterface $httpClient, $baseUri)
    {
        parent::__construct($httpClient, $baseUri);
    }

    public function clientConnections()
    {
        return $this->get('client_connections');
    }

    public function log($dateTime, $ipAddress)
    {
        return $this->get(
            'log',
            [
                'date_time' => $dateTime,
                'ip_address' => $ipAddress,
            ]
        );
    }

    public function stats()
    {
        return $this->get('stats');
    }

    public function disabledUsers()
    {
        return $this->get('disabled_users');
    }

    public function isDisabledUser($userId)
    {
        return $this->get('is_disabled_user', ['user_id' => $userId]);
    }

    public function enableUser($userId)
    {
        return $this->post('enable_user', ['user_id' => $userId]);
    }

    public function disableUser($userId)
    {
        return $this->post('disable_user', ['user_id' => $userId]);
    }

    public function hasOtpSecret($userId)
    {
        return $this->get('has_otp_secret', ['user_id' => $userId]);
    }

    public function disabledCommonNames()
    {
        return $this->get('disabled_common_names');
    }

    public function isDisabledCommonName($commonName)
    {
        return $this->get('is_disabled_common_name', ['common_name' => $commonName]);
    }

    public function disableCommonName($commonName)
    {
        return $this->post('disable_common_name', ['common_name' => $commonName]);
    }

    public function enableCommonName($commonName)
    {
        return $this->post('enable_common_name', ['common_name' => $commonName]);
    }

    public function killClient($commonName)
    {
        return $this->post('kill_client', ['common_name' => $commonName]);
    }

    public function serverProfile($profileId)
    {
        return $this->get('server_profile', ['profile_id' => $profileId]);
    }

    public function instanceConfig()
    {
        return $this->get('instance_config');
    }

    public function userGroups($userId)
    {
        return $this->get('user_groups', ['user_id' => $userId]);
    }

    public function hasVootToken($userId)
    {
        return $this->get('has_voot_token', ['user_id' => $userId]);
    }

    public function setVootToken($userId, $vootToken)
    {
        return $this->post(
            'set_voot_token',
            [
                'user_id' => $userId,
                'voot_token' => $vootToken,
            ]
        );
    }

    public function deleteOtpSecret($userId)
    {
        return $this->post('delete_otp_secret', ['user_id' => $userId]);
    }

    public function setOtpSecret($userId, $otpSecret, $otpKey)
    {
        return $this->post(
            'set_otp_secret',
            [
                'user_id' => $userId,
                'otp_secret' => $otpSecret,
                'otp_key' => $otpKey,
            ]
        );
    }

    public function verifyOtpKey($userId, $otpKey)
    {
        return $this->post(
            'verify_otp_key',
            [
                'user_id' => $userId,
                'otp_key' => $otpKey,
            ]
        );
    }

    public function connect($profileId, $commonName, $ip4, $ip6, $connectedAt)
    {
        return $this->post(
            'connect',
            [
                'profile_id' => $profileId,
                'common_name' => $commonName,
                'ip4' => $ip4,
                'ip6' => $ip6,
                'connected_at' => $connectedAt,
            ]
        );
    }

    public function disconnect($profileId, $commonName, $ip4, $ip6, $connectedAt, $disconnectedAt, $bytesTransferred)
    {
        return $this->post(
            'disconnect',
            [
                'profile_id' => $profileId,
                'common_name' => $commonName,
                'ip4' => $ip4,
                'ip6' => $ip6,
                'connected_at' => $connectedAt,
                'disconnected_at' => $disconnectedAt,
                'bytes_transferred' => $bytesTransferred,
            ]
        );
    }
}
