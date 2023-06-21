new AirDatepicker("#input-daterange", {
    autoClose: true,
    range: true,
    multipleDatesSeparator: " s/d ",
});

new AirDatepicker("#tanggal_pemesanan_pesawat", {
    buttons: [
        {
            content: "Today",
            className: "custom-button-classname",
            onClick: (dp) => {
                let date = new Date();
                dp.selectDate(date);
                dp.setViewDate(date);
            },
        },
        "clear",
    ],
    autoClose: true,
});

new AirDatepicker("#tanggal_pemesanan_hotel", {
    buttons: [
        {
            content: "Today",
            className: "custom-button-classname",
            onClick: (dp) => {
                let date = new Date();
                dp.selectDate(date);
                dp.setViewDate(date);
            },
        },
        "clear",
    ],
    autoClose: true,
});

new AirDatepicker("#tanggal_pemesanan_kereta", {
    buttons: [
        {
            content: "Today",
            className: "custom-button-classname",
            onClick: (dp) => {
                let date = new Date();
                dp.selectDate(date);
                dp.setViewDate(date);
            },
        },
        "clear",
    ],
    autoClose: true,
});

new AirDatepicker("#tanggal_keberangkatan_pesawat", {
    buttons: [
        {
            content: "Today",
            className: "custom-button-classname",
            onClick: (dp) => {
                let date = new Date();
                dp.selectDate(date);
                dp.setViewDate(date);
            },
        },
        "clear",
    ],
    autoClose: true,
});

new AirDatepicker("#tanggal_keberangkatan_kereta", {
    buttons: [
        {
            content: "Today",
            className: "custom-button-classname",
            onClick: (dp) => {
                let date = new Date();
                dp.selectDate(date);
                dp.setViewDate(date);
            },
        },
        "clear",
    ],
    autoClose: true,
});

new AirDatepicker("#tanggal_tiba_kereta", {
    buttons: [
        {
            content: "Today",
            className: "custom-button-classname",
            onClick: (dp) => {
                let date = new Date();
                dp.selectDate(date);
                dp.setViewDate(date);
            },
        },
        "clear",
    ],
    autoClose: true,
});

new AirDatepicker("#tanggal_checkin", {
    buttons: [
        {
            content: "Today",
            className: "custom-button-classname",
            onClick: (dp) => {
                let date = new Date();
                dp.selectDate(date);
                dp.setViewDate(date);
            },
        },
        "clear",
    ],
    autoClose: true,
});

new AirDatepicker("#tanggal_checkout", {
    buttons: [
        {
            content: "Today",
            className: "custom-button-classname",
            onClick: (dp) => {
                let date = new Date();
                dp.selectDate(date);
                dp.setViewDate(date);
            },
        },
        "clear",
    ],
    autoClose: true,
});

new AirDatepicker("#tanggal_keberangkatan_pesawat_edit", {
    buttons: [
        {
            content: "Today",
            className: "custom-button-classname",
            onClick: (dp) => {
                let date = new Date();
                dp.selectDate(date);
                dp.setViewDate(date);
            },
        },
        "clear",
    ],
    autoClose: true,
});
new AirDatepicker("#tanggal_tiba_pesawat_edit", {
    buttons: [
        {
            content: "Today",
            className: "custom-button-classname",
            onClick: (dp) => {
                let date = new Date();
                dp.selectDate(date);
                dp.setViewDate(date);
            },
        },
        "clear",
    ],
    autoClose: true,
});
