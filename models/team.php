<?php 
class team {
    private ?int $id = NULL;
    private ?string $name = NULL;
    private ?string $description  = NULL;
    private ?int $logo = NULL;
    private ?string $url = NULL;
    private ?string $alt = NULL;

    public function __construct()
    {
    }

    public function getId(): int {
        return $this->id;
    }
    public function setId (int $id): void {
        $this->id = $id;
    }
    
    public function getname() : string {
        return $this->name;
    }

    public function setname(string $name) : void {
        $this->name = $name;
    }
    public function getdescription(): string {
        return $this->description;
    }
    public function setdescription(string $description): void {
        $this->$description = $description;
    }

    public function getlogo(): int {
        return $this->logo;
    }
    public function setlogo (int $logo):  void {
        $this->$logo = $logo;
    }

    public function getUrl(): int {
        return $this->url;
    }
    public function setUrl(int $url):  void {
        $this->url = $url;
    }

    public function getAlt(): int {
        return $this->alt;
    }
    public function setAlt(int $alt):  void {
        $this->alt = $alt;
    }
}
?>