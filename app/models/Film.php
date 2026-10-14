<?php
class Film
{
    private PDO $db;
    public function __construct(PDO $db)
    {
        $this->db = $db;
    }
    public function getAll(): array
    {
        $stmt = $this->db->query(
            "SELECT * FROM film ORDER BY id DESC"
        );
        return $stmt->fetchAll();
    }
    public function findById(int $id): array|false
    {
        $stmt = $this->db->prepare(
            "SELECT * FROM film WHERE id = :id"
        );

        $stmt->execute(['id' => $id]);
        return $stmt->fetch();
    }
    public function insert(array $data): bool
    {
        $sql = "INSERT INTO film
                (judul, genre, tahun_rilis, sutradara, durasi)
                VALUES
                (:judul, :genre, :tahun_rilis, :sutradara, :durasi)";

        $stmt = $this->db->prepare($sql);
        return $stmt->execute($data);
    }
    public function update(int $id, array $data): bool
    {
        $sql = "UPDATE film SET
                judul = :judul, 
                genre = :genre, 
                tahun_rilis = :tahun_rilis,
                sutradara = :sutradara,
                durasi = :durasi
                WHERE id = :id";

        $stmt = $this->db->prepare($sql);
        $data['id'] = $id;
        return $stmt->execute($data);
    }
    public function delete(int $id): bool
    {
        $stmt = $this->db->prepare(
            "DELETE FROM film WHERE id = :id"
        );
        return $stmt->execute(['id' => $id]);
    }
}