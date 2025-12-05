<?php 
class player {
    private ?int $id = NULL;
    private ?string $name = NULL;
    private ?string $description  = NULL;
    private ?string $logo = NULL;
    public function __construct()
    {
    }

    public function getId(): ?int {
        return $this->id;
    }
    public function setId (?int $id): void {
        $this->id = $id;
    }
    
    public function getname() : ?string {
        return $this->name;
    }

    public function setname(?string $name) : void {
        $this->name = $name;
    }
    public function getdescription(): ?string {
        return $this->description;
    }
    public function setdescription(?string $description): void {
        $this->$description = $description;
    }

    public function getlogo(): ?string {
        return $this->logo;
    }
    public function setlogo (?string $logo):  void {
        $this->$logo = $logo;
    }

}
?>