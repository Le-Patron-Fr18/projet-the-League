<?php 
class player {
    private ?int $id = NULL;
    private ?string $nickname = NULL;
    private ?string $bio = NULL;
    private ?string $portrait = NULL;
    private ?string $team = NULL;

    public function __construct()
    {
    }

    public function getId(): ?int {
        return $this->id;
    }
    public function setId (?int $id): void {
        $this->id = $id;
    }
    
    public function getnickname() : ?string {
        return $this->nickname;
    }

    public function setnickname(?string $nickname) : void {
        $this->nickname = $nickname;
    }
    public function getbio(): ?string {
        return $this->bio;
    }
    public function setbio(?string $bio): void {
        $this->$bio = $bio;
    }

    public function getportrait(): ?string {
        return $this->portrait;
    }
    public function setportrait (?string $portrait):  void {
        $this->$portrait = $portrait;
    }

    public function getteam(): ?string {
        return $this->team;
    }
}
?>