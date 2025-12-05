<?php 
class Team {
    private ?int $id = null;
    private ?string $name = null;
    private ?string $description  = null;
    private ?int $logo = null;
    private ?string $url = null;
    private ?string $alt = null;

    public function __construct()
    {
    }

    public function getId(): ?int {
        return $this->id;
    }
    public function setId (?int $id): void {
        $this->id = $id;
    }

    public function getName() : ?string {
        return $this->name;
    }

    public function setName(?string $name) : void {
        $this->name = $name;
    }
    public function getDescription(): ?string {
        return $this->description;
    }
    public function setDescription(?string $description): void {
        $this->description = $description;
    }

    public function getLogo(): ?int {
        return $this->logo;
    }
    public function setLogo (?int $logo):  void {
        $this->logo = $logo;
    }

    public function getUrl(): ?string {
        return $this->url;
    }
    public function setUrl(?string $url):  void {
        $this->url = $url;
    }

    public function getAlt(): ?string {
        return $this->alt;
    }
    public function setAlt(?string $alt):  void {
        $this->alt = $alt;
    }
}
?>
