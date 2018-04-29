function callAjax(dataObject){
  return $.ajax({
    url: dataObject.url,
    type: dataObject.type,
    data: dataObject.data
  });
}
