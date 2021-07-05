<?php

class Order {

    private string $id;

    private string $fname;

    private string $lname;

    private string $mail;

    private string $date;

    private array $itemList;

    private float $total;

    public function __construct(string $fname, string $lname, string $mail, string $date, array $itemList, float $total) {
        $this->fname = $fname;
        $this->lname = $lname;
        $this->mail = $mail;
        $this->date = $date;
        $this->itemList = $itemList;
        $this->total = $total;
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
    public function getDate(): string {
        return $this->date;
    }

    /**
     * @param string $date
     */
    public function setDate(string $date): void {
        $this->date = $date;
    }



    /**
     * @return array
     */
    public function getItemList(): array {
        return $this->itemList;
    }

    /**
     * @param array $itemList
     */
    public function setItemList(array $itemList): void {
        $this->itemList = $itemList;
    }

    /**
     * @return float
     */
    public function getTotal(): float
    {
        return $this->total;
    }

    /**
     * @param float $total
     */
    public function setTotal(float $total): void
    {
        $this->total = $total;
    }



}