<?php 
class player {
    private ?int $id = NULL;
    private ?string $nickname = NULL;
    private ?string $bio = NULL;
    private ?int $portrait = NULL;
    private ?int $team = NULL;
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
    
    public function getNickname() : string {
        return $this->nickname;
    }
    public function setNickname(string $nickname) : void {
        $this->nickname = $nickname;
    }

    public function getBio(): string {
        return $this->bio;
    }
    public function setBio(string $bio): void {
        $this->bio = $bio;
    }

    public function getPortrait(): int {
        return $this->portrait;
    }
    public function setPortrait (int $portrait):  void {
        $this->portrait = $portrait;
    }

    public function getTeam(): int {
        return $this->team;
    }
    public function setTeam(int $team):  void {
        $this->team = $team;
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