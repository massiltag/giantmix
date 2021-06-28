<?php

class Client {

    private string $id;

    private string $fname;

    private string $lname;

    private string $mail;

    private string $pwd;

    public function __construct(string $fname, string $lname, string $mail, string $pwd) {
        $this->fname = $fname;
        $this->lname = $lname;
        $this->mail = $mail;
        $this->pwd = $pwd;
    }

    /**
     * @return string
     */
    public function getId(): string {
        return $this->id;
    }

    /**
     * @param string $id
     */
    public function setId(string $id): void {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getFname(): string {
        return $this->fname;
    }

    /**
     * @param string $fname
     */
    public function setFname(string $fname): void {
        $this->fname = $fname;
    }

    /**
     * @return string
     */
    public function getLname(): string {
        return $this->lname;
    }

    /**
     * @param string $lname
     */
    public function setLname(string $lname): void {
        $this->lname = $lname;
    }

    /**
     * @return string
     */
    public function getMail(): string {
        return $this->mail;
    }

    /**
     * @param string $mail
     */
    public function setMail(string $mail): void {
        $this->mail = $mail;
    }

    /**
     * @return string
     */
    public function getPwd(): string {
        return $this->pwd;
    }

    /**
     * @param string $pwd
     */
    public function setPwd(string $pwd): void {
        $this->pwd = $pwd;
    }

}