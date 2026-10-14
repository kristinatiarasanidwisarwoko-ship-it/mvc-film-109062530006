<?php
class FilmController
{
    private Film $film;
    public function __construct(Film $film)
    {
        $this->film = $film;
    }
    public function index(): void
    {
        $films = $this->film->getAll();
        require __DIR__ . '/../views/film/index.php';
    }
    public function create(): void
    {
        require __DIR__ . '/../views/film/create.php';
    }
    public function store(): void
    {
        $data = $this->validateInput($_POST);

        $this->film->insert($data);

        $this->redirect('created');
    }
    public function edit(): void
    {
        $id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
        $film = $id ? $this->film->findById($id) : false;

        if (!$film) {
            $this->redirect('not_found');
        }
        require __DIR__ . '/../views/film/edit.php';
    }
    public function update(): void
    {
        $id = filter_input(INPUT_POST, 'id', FILTER_VALIDATE_INT);

        if (!$id || !$this->film->findById($id)) {
            $this->redirect('not_found');
        }
        $data = $this->validateInput($_POST);
        $this->film->update($id, $data);

        $this->redirect('updated');
    }
    public function delete(): void
    {
        $id = filter_input(INPUT_POST, 'id', FILTER_VALIDATE_INT);

        if (!$id || !$this->film->findById($id)) {
            $this->redirect('not_found');
        }
        $this->film->delete($id);

        $this->redirect('deleted');
    }
    private function validateInput(array $input): array
    {
        $judul = trim($input['judul'] ?? '');
        $genre = trim($input['genre'] ?? '');
        $tahun = filter_var(
            $input['tahun_rilis'] ?? '',
            FILTER_VALIDATE_INT
        );
        $sutradara = trim($input['sutradara'] ?? '');
        $durasi = filter_var(
            $input['durasi'] ?? '',
            FILTER_VALIDATE_INT
        );

        $tahunMaksimal = (int) date('Y');

        if (
            $judul === '' ||
            $genre === '' ||
            $sutradara === '' ||
            $tahun === false ||
            $tahun < 1888 ||
            $tahun > $tahunMaksimal ||
            $durasi === false ||
            $durasi < 1
        ) {
            http_response_code(422);
            exit('Input tidak valid. Periksa kembali data film.');
        }
        return [
            'judul' => $judul,
            'genre' => $genre,
            'tahun_rilis' => $tahun,
            'sutradara' => $sutradara,
            'durasi' => $durasi,
        ];
    }
    private function redirect(string $status): void
    {
        header(
            'Location: index.php?page=film&status=' .
            urlencode($status)
        );
        exit;
    }
}