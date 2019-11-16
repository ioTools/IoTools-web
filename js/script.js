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