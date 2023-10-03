$(document).ready(function() {
  $('#uploadForm').on('submit', function(event) {
    event.preventDefault();  // Zapobiegaj standardowemu zachowaniu formularza

    var formData = new FormData(this);

    $.post({
      url: 'endpoint',  
      data: formData,
      processData: false,
      contentType: false,
      success: function(response) {
        $('#response').html('Plik został przesłany. Odpowiedź serwera: ' + response);
      },
      error: function(xhr, status, error) {
        $('#response').html('Wystąpił błąd podczas przesyłania pliku: ' + error);
      }
    });
  });
});
