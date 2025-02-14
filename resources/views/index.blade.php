<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="Keywords" content="Наш сайт">
    <title>API</title>
    <script src="https://api-maps.yandex.ru/v3/?apikey=93c14f3b-3a0a-4938-995e-cad28ae42e46&lang=ru_RU"></script>
</head>
<body>
    <div id="map" style="width: 600px; height: 400px"></div>
<script>
    async function initMap() {
        try {
            await ymaps3.ready;

            const { YMap, YMapDefaultSchemeLayer, YMapDefaultFeaturesLayer, YMapMarker } = ymaps3;

            const response = await fetch('/customization.json');
            if (!response.ok) {
                throw new Error(`Ошибка HTTP: ${response.status}`);
            }
            const customization = await response.json();

            const map = new YMap(
                document.getElementById('map'),
                {
                    location: {
                        center: [37.588144, 55.733842],
                        zoom: 10
                    }
                }
            );

            const layer = new YMapDefaultSchemeLayer({
                customization: customization
            });

            map.addChild(layer);
            map.addChild(new YMapDefaultFeaturesLayer());

            const markerSvg = `<svg id="marker" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" fill="#e9590c"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <rect x="0" fill="none" width="20" height="20"></rect> <g> <path d="M10 2c4.42 0 8 3.58 8 8s-3.58 8-8 8-8-3.58-8-8 3.58-8 8-8zm0 13c2.76 0 5-2.24 5-5s-2.24-5-5-5-5 2.24-5 5 2.24 5 5 5z"></path> </g> </g></svg>`;

            const addresses = {!! json_encode($addresses) !!};
            addresses.forEach(address => {
                const marker = new YMapMarker({
                    source: '/img/marker.svg',
                    coordinates: [address.longitude, address.latitude],
                    title: address.name
                });
                map.addChild(marker);

                console.log(marker.src)
            });

            console.log("Карта загружена успешно");
        } catch (error) {
            console.error("Ошибка при загрузке карты:", error);
        }
    }

    initMap();

</script>
</body>
</html>
