function openImage(name){
  var modal = new tingle.modal({
      closeMethods: ['overlay', 'button', 'escape'],
      closeLabel: "Chiudi",
      onOpen: function() {
        modal.setContent(
              '<div>'+
              '<img style ="max-width:100%" src="imgs/'+name+'"></img>'+
              '</div>'
          );
      },
      onClose: function() {
          console.log('modal closed');
      }
  });
  modal.open();
}

function flatAlert(titolo, testo, icona, url, button=false){
  if (button){
    swal({
      title: titolo,
      text: testo,
      icon: icona,
      buttons: {
        cancel: {
          text: "Annulla",
          visible: true,
        },
        button: {
          text: "Continua",
          visible: true,
        }
      }
    }).then(azione => {
      if (azione){
        location.href = url;
      }else{
        swal.close();
      }
    });
  }else{
    swal({
      title: titolo,
      text: testo,
      icon: icona,
    }).then(azione => {
      if (azione){
        location.href = url;
      }else{
        swal.close();
      }
    });
  } 
}