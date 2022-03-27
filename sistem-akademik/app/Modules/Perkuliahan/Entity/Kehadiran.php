<?php
namespace App\Modules\Perkuliahan\Entity;

use App\Entity\User;

class Kehadiran{
    private int $id;
	private string $keterangan;
	public User $user;

	function __construct()
	{
	}

	function __destruct()
	{
	}

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId(int $id): void
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getKeterangan(): string
    {
        return $this->keterangan;
    }

    /**
     * @param string $keterangan
     */
    public function setKeterangan(string $keterangan): void
    {
        $this->keterangan = $keterangan;
    }

    /**
     * @return User
     */
    public function getUser(): User
    {
        return $this->user;
    }

    /**
     * @param User $user
     */
    public function setUser(User $user): void
    {
        $this->user = $user;
    }
    public function getArray():array {
        return [
            'id' => $this->getId(),
            'keterangan' => $this->getKeterangan(),
            'user' => $this->getUser(),
        ];
    }
}
?>
