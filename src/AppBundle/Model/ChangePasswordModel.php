<?php
/**
 * Created by PhpStorm.
 * User: roebeckers
 * Date: 17/11/2016
 * Time: 8:54 PM
 */

namespace AppBundle\Model;


use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\Validator\Constraints\UserPassword;
use Symfony\Component\Validator\Constraints as Assert;

class ChangePasswordModel
{
    /**
     * @UserPassword(
     *     message = "Wrong value for your current password."
     * )
     */
    protected $oldPassword;

    /**
     * @Assert\Length(
     *     min = 8,
     *     minMessage = "Password should by a minimum of 8 characters long."
     * )
     */
    protected $newPassword;


    // GETTERS AND SETTERS

    /**
     * @return mixed
     */
    public function getOldPassword()
    {
        return $this->oldPassword;
    }

    /**
     * @return mixed
     */
    public function getNewPassword()
    {
        return $this->newPassword;
    }

    /**
     * @param mixed $oldPassword
     */
    public function setOldPassword($oldPassword)
    {
        $this->oldPassword = $oldPassword;
    }

    /**
     * @param mixed $newPassword
     */
    public function setNewPassword($newPassword)
    {
        $this->newPassword = $newPassword;
    }


}