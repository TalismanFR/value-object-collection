PHP ValueObjects Collection
==

Набор Объектов Значений общего назначения. 
Преимущественно типичные для РФ (инн, снилс, огрн и т.д.).

Список Объектов Значений:

 - Inn `services\valueobjects\INN\Inn` ИНН как физ. или юр. лица.
 - Snils `services\valueobjects\SNILS\Snils` СНИЛС.
 - OGRN `services\valueobjects\OGRN\Ogrn` ОГРН.
 - OGRNIP `services\valueobjects\OGRNIP\Ogrnip` ОГРНИП.
 Все классы имеют метод `equaltTo` для сравнения двух объектов.
 Так же реализуется интерфес `JsonSerializable` и магический метод `__toString`.
 