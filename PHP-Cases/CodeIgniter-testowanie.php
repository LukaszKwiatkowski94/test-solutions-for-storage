<form action="<?php echo base_url('upload/do_upload'); ?>" method="post" enctype="multipart/form-data">
  <input type="file" name="userfile" size="20" />
  <br /><br />
  <input type="submit" value="upload" />
</form>

class Upload extends CI_Controller {

  public function __construct() {
    parent::__construct();
    $this->load->helper(array('form', 'url'));
  }

  public function do_upload() {
    $config['upload_path'] = './uploads/'; // ścieżka do katalogu, w którym będą zapisywane pliki
    $config['allowed_types'] = 'gif|jpg|png'; // dozwolone typy plików
    $config['max_size'] = 100; // maksymalny rozmiar pliku w KB
    $config['max_width'] = 1024; // maksymalna szerokość obrazka
    $config['max_height'] = 768; // maksymalna wysokość obrazka

    // Dodajemy generowanie unikalnej nazwy pliku
    $config['file_name'] = uniqid();

    $this->load->library('upload', $config);

    if (!$this->upload->do_upload('userfile')) { // jeśli plik nie został wysłany lub wystąpił inny błąd
      $error = array('error' => $this->upload->display_errors());
      $this->load->view('upload_form', $error);
    } else { // jeśli plik został wysłany poprawnie
      $data = array('upload_data' => $this->upload->data());
      $this->load->view('upload_success', $data);
    }
  }
}

<!DOCTYPE html>
<html>
<head>
  <title>Upload Success</title>
</head>
<body>

  <h3>Your file was successfully uploaded!</h3>

  <ul>
    <?php foreach ($upload_data as $item => $value): ?>
      <li><?php echo $item; ?>: <?php echo $value; ?></li>
    <?php endforeach; ?>
  </ul>

  <p><?php echo anchor('upload', 'Upload Another File!'); ?></p>

</body>
</html>


uniqid()

echo $data['upload_data']['file_name'];

-----------------------------------------------------------------------

public function download_file($file_name) {
    // Ładujemy helper 'download'
    $this->load->helper('download');
 
    // Ładujemy ścieżkę do folderu, w którym przechowywane są pliki
    $file_path = './uploads/' . $file_name;
 
    // Pobieramy plik z serwera
    if(file_exists($file_path)) {
        // Używamy funkcji force_download() z helpera 'download' do pobrania pliku z serwera
        force_download($file_path, NULL);
    } else {
        // Jeśli plik nie istnieje, wyświetlamy odpowiedni komunikat
        echo "Plik nie istnieje.";
    }
}

-----------------------------------------------------------------------

CREATE TABLE files (
  id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  filename VARCHAR(255) NOT NULL,
  filepath VARCHAR(255) NOT NULL,
  filetype VARCHAR(255) NOT NULL,
  filesize INT(11) NOT NULL,
  uploaded_by INT(11) NOT NULL,
  idD INT(11) NOT NULL,
  is_active TINYINT(1) NOT NULL DEFAULT 1,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-----------------------------------------------------------------------

public function addFile($filename, $filepath, $filetype, $filesize, $uploaded_by) {
    $this->db->insert('files', array(
        'filename' => $filename,
        'filepath' => $filepath,
        'filetype' => $filetype,
        'filesize' => $filesize,
        'idD' => $idDriver,
        'uploaded_by' => $uploaded_by
    ));
    return $this->db->insert_id();
}

-----------------------------------------------------------------------

public function getFileById($fileId) {
    $this->db->select('*');
    $this->db->from('files');
    $this->db->where('id', $fileId);
    $query = $this->db->get();
    return $query->row();
}

potem $file->filename

-----------------------------------------------------------------------

class File_model extends CI_Model {

    public function get_files_by_uploader($uploader_id) {
        $this->db->select('*');
        $this->db->from('files');
        $this->db->where('uploaded_by', $uploader_id);
        $query = $this->db->get();
        return $query->result();
    }

}

-------------------------------------------------------------------------

class File extends CI_Controller {

    public function files_by_uploader($uploader_id) {
        $this->load->model('file_model');
        $files = $this->file_model->get_files_by_uploader($uploader_id);
        $data['files'] = $files;
        $this->load->view('files_list', $data);
    }

}


--------------------------------------------------------------------------


// Przykładowe zapytanie SQL
$sql = "SELECT * FROM users WHERE status = 'active'";

// Pobierz obiekt bazy danych
$db = \Config\Database::connect();

// Wykonaj zapytanie SQL
$result = $db->query($sql);

// Przetwórz wynik zapytania
foreach ($result->getResult() as $row) {
    echo $row->name;
}
