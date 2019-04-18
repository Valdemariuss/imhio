<?php
use PHPUnit\Framework\TestCase;

final class EmailControllerTest extends TestCase
{
    private $validEmails = ['wwwww@eee.ru', 'kkkkk.www@eee.ru'];
    private $noEmails = [null, false, 1, ''];
    private $badEmails = ['kkkkk.wwweee.ru', 'kkkkk@wwwe', '@', 'ggg@'];

    public function testCheckEmails() {

        foreach ($this->validEmails as $value) {
            $result = EmailController::checkEmail($value);
            $this->assertEquals((object)['validation'=> true], $result);
        }

        foreach ($this->noEmails as $value) {
            $result = EmailController::checkEmail($value);
            $this->assertEquals((object)['err'=> 'EMAIL_REQUIRED'], $result);
        }

        foreach ($this->badEmails as $value) {
            $result = EmailController::checkEmail($value);
            $this->assertEquals((object)['err'=> 'EMAIL_BAD'], $result);
        }
    }
}
