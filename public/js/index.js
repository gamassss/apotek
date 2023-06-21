// main file global js function
$(document).ready(function () {
    $(".select2").select2({
        theme: "bootstrap-5",
    });

    $("#Tambahkan-Sebagai-Pembayar").on("click", function () {
        $("#nama-pembayar").val($(" #nama-pemesan").val());
        $("#unit_kerja_pembayar")
            .val($("#unit_kerja_pemesan").val())
            .trigger("change");
    });

    $("#myTable").on("click", "[dismiss-modal]", function () {
        $("#" + $(this).attr("dismiss-modal")).hide();
    });
    $("#edit_nama_penumpang").on("keydown", function (event) {
        if (event.keyCode === 13) {
            // do something, e.g. submit the form
            $("#edit_jenis_kelamin").focus();
        }
    });
    $("#nama_penumpang").on("keydown", function (event) {
        if (event.keyCode === 13) {
            // do something, e.g. submit the form
            $("#jenis_kelamin").focus();
        }
    });
    $("#check-all-penumpang").on("click", function () {
        $(".select-penumpang").prop("checked", $(this).prop("checked"));
    });
});
function reset_form() {
    Swal.fire({
        title: "Are you sure?",
        text: "The current settings on the form will be reset and reverted to their initial state. Are you sure you want to proceed?",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#03c3ec",
        cancelButtonColor: "#ff3e1d",
        confirmButtonText: "Yes, reset it!",
    }).then((result) => {
        if (result.isConfirmed) {
            $("input").val("");
            $("select").val("0").trigger("change");
        }
    });
}

function submit_form_reservasi() {
    Swal.fire({
        title: "Are you sure?",
        text: "Are you sure you want to proceed? Please double-check your information before continuing.",
        icon: "question",
        showCancelButton: true,
        confirmButtonColor: "#03c3ec",
        cancelButtonColor: "#ff3e1d",
        confirmButtonText: "Yes, continue!",
    }).then((result) => {
        if (result.isConfirmed) {
            $('#form-reservasi').submit();
        }
    });
}

function confirmAlert(params) {
    Swal.fire({
        title: "Are you sure?",
        text: "Are you sure you want to proceed? Please double-check your information before continuing.",
        icon: "question",
        showCancelButton: true,
        confirmButtonColor: "#03c3ec",
        cancelButtonColor: "#ff3e1d",
        confirmButtonText: "Yes, continue!",
    }).then((result) => {
        if (result.isConfirmed) {
            $(`#${params}`).submit();
        }
    });
}

function printInvoice() {
    var checkedValues = $('input[type="checkbox"].select-penumpang:checked')
        .map(function () {
            return this.value;
        })
        .get();
    $("#id_penumpang").val(checkedValues.join(","));
    $("#print_invoice").submit();
}

function generateRandomDataPesawat() {
    // console.log("clicked");
    // random date
    const currentDate = new Date();
    const startDate = new Date("2023-05-01");
    const timeDiff = currentDate.getTime() - startDate.getTime();
    const randomTime = Math.floor(Math.random() * timeDiff);
    const randomDate = new Date(startDate.getTime() + randomTime);
    const randomDateString = randomDate.toISOString().split("T")[0];

    // random jam berangkat dan tiba
    const randomDepartureHour = Math.floor(Math.random() * 24); // Jam berangkat (0-23)
    const randomDepartureMinute = Math.floor(Math.random() * 60); // Menit berangkat (0-59)

    const randomArrivalHour =
        randomDepartureHour +
        Math.floor(Math.random() * (24 - randomDepartureHour));
    const randomArrivalMinute = Math.floor(Math.random() * 60); // Menit tiba (0-59)

    // Format waktu berangkat dan tiba dalam string
    const departureTimeString = `${randomDepartureHour
        .toString()
        .padStart(2, "0")}:${randomDepartureMinute
        .toString()
        .padStart(2, "0")}`;
    const arrivalTimeString = `${randomArrivalHour
        .toString()
        .padStart(2, "0")}:${randomArrivalMinute.toString().padStart(2, "0")}`;

    // nama orang
    const namaOrang = [
        "Ahmad",
        "Budi",
        "Citra",
        "Dewi",
        "Eko",
        "Fita",
        "Gita",
        "Hadi",
        "Indah",
        "Joko",
        "Kartika",
        "Linda",
        "Maulana",
        "Nadia",
        "Oscar",
        "Putri",
        "Qinara",
        "Rudi",
        "Sinta",
        "Toni",
        "Umi",
        "Vera",
        "Wawan",
        "Xavier",
        "Yanti",
        "Zainal",
    ];

    function generateRandomNumber(min, max) {
        return Math.floor(Math.random() * (max - min + 1) + min);
    }

    function generateRandomFlightNumber() {
        const prefix = [
            "GA",
            "JT",
            "QZ",
            "ID",
            "MH",
            "SQ",
            "CX",
            "EK",
            "QR",
            "LH",
        ];
        const number = Math.floor(Math.random() * 1000) + 100;
        const suffix = ["A", "B", "C", "D", "E"];

        const randomPrefix = prefix[Math.floor(Math.random() * prefix.length)];
        const randomSuffix = suffix[Math.floor(Math.random() * suffix.length)];

        return randomPrefix + number + randomSuffix;
    }

    function generateRandomTicketNumber() {
        const min = 100000000000; // Nilai minimum 12 digit angka
        const max = 999999999999; // Nilai maksimum 12 digit angka

        const ticketNumber = Math.floor(Math.random() * (max - min + 1)) + min;
        return ticketNumber.toString();
    }

    function generateRandomBookingCode() {
        const characters = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
        const numbers = "0123456789";
        const codeLength = 6;
        let bookingCode = "";

        for (let i = 0; i < codeLength; i++) {
            if (i < 3) {
                const randomIndex = Math.floor(Math.random() * numbers.length);
                bookingCode += numbers.charAt(randomIndex);
            } else {
                const randomIndex = Math.floor(
                    Math.random() * characters.length
                );
                bookingCode += characters.charAt(randomIndex);
            }
        }

        return bookingCode;
    }

    // random harga
    const hargaBeli = generateRandomNumber(100000, 1500000);
    const hargaPublish = generateRandomNumber(hargaBeli, 1500000);
    const hargaJual = generateRandomNumber(hargaPublish, 1500000);

    $("#tanggal_keberangkatan_pesawat").val(randomDateString);
    $("#jam_keberangkatan").val(departureTimeString);
    $("#jam_tiba").val(arrivalTimeString);
    $("#nama-pemesan").val(
        namaOrang[Math.floor(Math.random() * namaOrang.length)]
    );
    $("#unit_kerja_pemesan")
        .val(generateRandomNumber(1, 71).toString())
        .trigger("change");
    $("#nama-pembayar").val(
        namaOrang[Math.floor(Math.random() * namaOrang.length)]
    );
    $("#unit_kerja_pembayar")
        .val(generateRandomNumber(1, 71).toString())
        .trigger("change");
    $("#kelas").val("Ekonomi");
    $("#harga_beli").val(hargaBeli.toString());
    $("#harga_publish").val(hargaPublish.toString());
    $("#harga_jual").val(hargaJual.toString());
    $("#nomor_penerbangan").val(generateRandomFlightNumber());
    $("#nomor_ticket").val(generateRandomTicketNumber());
    $("#kode_booking_pesawat").val(generateRandomBookingCode());
    $("#status_pemesanan").val("Confirmed").trigger("change");
    $("#bandara_berangkat_id")
        .val(generateRandomNumber(1, 242).toString())
        .trigger("change");
    $("#bandara_tiba_id")
        .val(generateRandomNumber(1, 242).toString())
        .trigger("change");
    $("#maskapai_id")
        .val(generateRandomNumber(1, 13).toString())
        .trigger("change");
    $("#vendor_id")
        .val(generateRandomNumber(1, 14).toString())
        .trigger("change");
    // $("#Tambahkan-Sebagai-Pembayar").click();

    $("#kategori_pemesanan_id")
        .val(generateRandomNumber(1, 2))
        .trigger("change");
}

function generateRandomDataDokumen() {
    // console.log("clicked");
    // random date
    const currentDate = new Date();
    const startDate = new Date("2023-05-01");
    const timeDiff = currentDate.getTime() - startDate.getTime();
    const randomTime = Math.floor(Math.random() * timeDiff);
    const randomDate = new Date(startDate.getTime() + randomTime);
    const randomDateString = randomDate.toISOString().split("T")[0];

    // nama orang
    const namaOrang = [
        "Ahmad",
        "Budi",
        "Citra",
        "Dewi",
        "Eko",
        "Fita",
        "Gita",
        "Hadi",
        "Indah",
        "Joko",
        "Kartika",
        "Linda",
        "Maulana",
        "Nadia",
        "Oscar",
        "Putri",
        "Qinara",
        "Rudi",
        "Sinta",
        "Toni",
        "Umi",
        "Vera",
        "Wawan",
        "Xavier",
        "Yanti",
        "Zainal",
    ];

    function generateRandomNumber(min, max) {
        return Math.floor(Math.random() * (max - min + 1) + min);
    }

    // random harga
    const hargaBeli = generateRandomNumber(100000, 1500000);
    const hargaPublish = generateRandomNumber(hargaBeli, 1500000);
    const hargaJual = generateRandomNumber(hargaPublish, 1500000);

    $("#tanggal_keberangkatan_pesawat").val(randomDateString);
    $("#nama-pemesan").val(
        namaOrang[Math.floor(Math.random() * namaOrang.length)]
    );
    $("#unit_kerja_pemesan")
        .val(generateRandomNumber(1, 71).toString())
        .trigger("change");
    $("#nama-pembayar").val(
        namaOrang[Math.floor(Math.random() * namaOrang.length)]
    );
    $("#unit_kerja_pembayar")
        .val(generateRandomNumber(1, 71).toString())
        .trigger("change");
    $("#harga_beli").val(hargaBeli.toString());
    $("#harga_publish").val(hargaPublish.toString());
    $("#harga_jual").val(hargaJual.toString());
    $("#status_pemesanan").val("Confirmed").trigger("change");
    $("#vendor_id")
        .val(generateRandomNumber(27, 30).toString())
        .trigger("change");
    $("#jenis_dokumen").val('visa');
    $("#keterangan").val('keterangan');
    $("#kategori_pemesanan_id")
        .val(generateRandomNumber(1, 2))
        .trigger("change");
}

function generateRandomDataHotel() {
    const randomCheckInHour = Math.floor(Math.random() * 24); // Jam berangkat (0-23)
    const randomCheckInMinute = Math.floor(Math.random() * 60); // Menit berangkat (0-59)

    const randomCheckOutHour =
        randomCheckInHour +
        Math.floor(Math.random() * (24 - randomCheckInHour));
    const randomCheckOutMinute = Math.floor(Math.random() * 60); // Menit tiba (0-59)

    // Format waktu berangkat dan tiba dalam string
    const checkInTimeString = `${randomCheckInHour
        .toString()
        .padStart(2, "0")}:${randomCheckInMinute.toString().padStart(2, "0")}`;
    const checkOutTimeString = `${randomCheckOutHour
        .toString()
        .padStart(2, "0")}:${randomCheckOutMinute.toString().padStart(2, "0")}`;

    // random date checkin checkout
    function generateRandomFutureDate(minDays, maxDays) {
        const currentDate = new Date();
        const minDate = new Date();
        minDate.setDate(currentDate.getDate() + minDays);
        const maxDate = new Date();
        maxDate.setDate(currentDate.getDate() + maxDays);

        const randomTimestamp =
            Math.random() * (maxDate.getTime() - minDate.getTime()) +
            minDate.getTime();
        const randomDate = new Date(randomTimestamp);

        return randomDate;
    }

    function formatDate(date) {
        const year = date.getFullYear();
        const month = String(date.getMonth() + 1).padStart(2, "0");
        const day = String(date.getDate()).padStart(2, "0");

        return `${year}-${month}-${day}`;
    }

    const minCheckInDays = 7;
    const maxCheckOutDays = 9;

    const checkInDate = generateRandomFutureDate(
        minCheckInDays,
        maxCheckOutDays
    );
    const checkOutDate = generateRandomFutureDate(2, 3);

    function generateRandomRoomType() {
        const roomTypes = [
            "Standard Room",
            "Deluxe Room",
            "Suite",
            "Executive Suite",
            "Villa",
        ];
        const randomIndex = Math.floor(Math.random() * roomTypes.length);
        const randomRoomType = roomTypes[randomIndex];
        return randomRoomType;
    }

    function generateRandomNumber(min, max) {
        return Math.floor(Math.random() * (max - min + 1) + min);
    }

    // random harga
    const hargaBeli = generateRandomNumber(100000, 1500000);
    const hargaPublish = generateRandomNumber(hargaBeli, 1500000);
    const hargaJual = generateRandomNumber(hargaPublish, 1500000);

    const namaOrang = [
        "Ahmad",
        "Budi",
        "Citra",
        "Dewi",
        "Eko",
        "Fita",
        "Gita",
        "Hadi",
        "Indah",
        "Joko",
        "Kartika",
        "Linda",
        "Maulana",
        "Nadia",
        "Oscar",
        "Putri",
        "Qinara",
        "Rudi",
        "Sinta",
        "Toni",
        "Umi",
        "Vera",
        "Wawan",
        "Xavier",
        "Yanti",
        "Zainal",
    ];

    $(document).ready(function () {
        $("#jam_checkin").val(checkInTimeString);
        $("#jam_checkout").val(checkOutTimeString);
        $("#include_breakfast").val("1");
        $("#tanggal_checkout").val(formatDate(checkInDate));
        $("#tanggal_checkin").val(formatDate(checkOutDate));
        $("#lama_menginap").val(Math.random() > 0.5 ? "2" : "3");
        $("#jumlah_kamar").val(Math.ceil(Math.random() * 10).toString());
        $("#tipe_kamar").val(generateRandomRoomType());
        $("#harga_beli").val(hargaBeli.toString());
        $("#harga_publish").val(hargaPublish.toString());
        $("#harga_jual").val(hargaJual.toString());
        $("#kategori_pemesanan_id")
            .val(generateRandomNumber(1, 2))
            .trigger("change");
        $("#unit_kerja_pemesan")
            .val(generateRandomNumber(1, 71).toString())
            .trigger("change");
        $("#unit_kerja_pembayar")
            .val(generateRandomNumber(1, 71).toString())
            .trigger("change");
        $("#nama-pemesan").val(
            namaOrang[Math.floor(Math.random() * namaOrang.length)]
        );
        $("#nama-pembayar").val(
            namaOrang[Math.floor(Math.random() * namaOrang.length)]
        );
        $("#status_pemesanan").val("Confirmed").trigger("change");
        $("#vendor_id")
            .val(generateRandomNumber(23, 26).toString())
            .trigger("change");

        $("#hotel_id")
            .val(generateRandomNumber(1, 1069).toString())
            .trigger("change");
    });
    // $("#Tambahkan-Sebagai-Pembayar").click();
}

function generateRandomDataKereta() {
    function generateRandomNumber(min, max) {
        return Math.floor(Math.random() * (max - min + 1) + min);
    }

    function generateRandomBookingCode() {
        const characters = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
        const numbers = "0123456789";
        const codeLength = 6;
        let bookingCode = "";

        for (let i = 0; i < codeLength; i++) {
            if (i < 3) {
                const randomIndex = Math.floor(Math.random() * numbers.length);
                bookingCode += numbers.charAt(randomIndex);
            } else {
                const randomIndex = Math.floor(
                    Math.random() * characters.length
                );
                bookingCode += characters.charAt(randomIndex);
            }
        }

        return bookingCode;
    }

    const currentDate = new Date();
    const startDate = new Date("2023-05-01");
    const timeDiff = currentDate.getTime() - startDate.getTime();
    const randomTime = Math.floor(Math.random() * timeDiff);
    const randomDate = new Date(startDate.getTime() + randomTime);
    const randomDateString = randomDate.toISOString().split("T")[0];

    // random harga
    const hargaBeli = generateRandomNumber(100000, 1500000);
    const hargaPublish = generateRandomNumber(hargaBeli, 1500000);
    const hargaJual = generateRandomNumber(hargaPublish, 1500000);

    const namaOrang = [
        "Ahmad",
        "Budi",
        "Citra",
        "Dewi",
        "Eko",
        "Fita",
        "Gita",
        "Hadi",
        "Indah",
        "Joko",
        "Kartika",
        "Linda",
        "Maulana",
        "Nadia",
        "Oscar",
        "Putri",
        "Qinara",
        "Rudi",
        "Sinta",
        "Toni",
        "Umi",
        "Vera",
        "Wawan",
        "Xavier",
        "Yanti",
        "Zainal",
    ];

    const randomDepartureHour = Math.floor(Math.random() * 24); // Jam berangkat (0-23)
    const randomDepartureMinute = Math.floor(Math.random() * 60); // Menit berangkat (0-59)

    const randomArrivalHour =
        randomDepartureHour +
        Math.floor(Math.random() * (24 - randomDepartureHour));
    const randomArrivalMinute = Math.floor(Math.random() * 60); // Menit tiba (0-59)

    // Format waktu berangkat dan tiba dalam string
    const departureTimeString = `${randomDepartureHour
        .toString()
        .padStart(2, "0")}:${randomDepartureMinute
        .toString()
        .padStart(2, "0")}`;
    const arrivalTimeString = `${randomArrivalHour
        .toString()
        .padStart(2, "0")}:${randomArrivalMinute.toString().padStart(2, "0")}`;

    $("#harga_beli").val(hargaBeli.toString());
    $("#harga_publish").val(hargaPublish.toString());
    $("#harga_jual").val(hargaJual.toString());
    $("#kategori_pemesanan_id")
        .val(generateRandomNumber(1, 2).toString())
        .trigger("change");
    $("#unit_kerja_pemesan")
        .val(generateRandomNumber(1, 71).toString())
        .trigger("change");
    $("#unit_kerja_pembayar")
        .val(generateRandomNumber(1, 71).toString())
        .trigger("change");
    $("#kereta_id")
        .val(generateRandomNumber(1, 49).toString())
        .trigger("change");
    // $("#stasiun_id").val(generateRandomNumber(1, 585).toString()).trigger("change");
    $("#stasiun_berangkat_id")
        .val(generateRandomNumber(1, 585).toString())
        .trigger("change");
    $("#stasiun_tiba_id")
        .val(generateRandomNumber(1, 585).toString())
        .trigger("change");
    $("#nama-pemesan").val(
        namaOrang[Math.floor(Math.random() * namaOrang.length)]
    );
    $("#nama-pembayar").val(
        namaOrang[Math.floor(Math.random() * namaOrang.length)]
    );
    $("#status_pemesanan").val("Confirmed").trigger("change");
    $("#vendor_id")
        .val(generateRandomNumber(15, 22).toString())
        .trigger("change");
    $("#kode_booking").val(generateRandomBookingCode());
    $("#tanggal_keberangkatan_kereta").val(randomDateString);
    $("#tanggal_tiba_kereta").val(randomDateString);
    $("#jam_keberangkatan").val(departureTimeString);
    $("#jam_tiba").val(arrivalTimeString);
}
