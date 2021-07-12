$("#coinAmount").keypress(() => {
  setTimeout(() => {
    let btcAmount = (parseFloat($("#coinAmount").val()) * rate) / 100000000;
    $("#btcAmount").val(btcAmount);
  }, 50);
});
$("#btcAmount").keypress(() => {
  setTimeout(() => {
    let coinAmount = (parseFloat($("#btcAmount").val()) * 100000000) / rate;
    $("#coinAmount").val(coinAmount);
  }, 50);
});

