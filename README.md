# WeWatch

## 📖 Opis Projektu
WeWatch to nowoczesne forum internetowe dedykowane miłośnikom filmów i seriali. Użytkownicy mogą przeglądać dostępne kategorie filmowe, dzielić się opiniami, komentować ulubione produkcje oraz prowadzić dyskusje na temat najnowszych premier. Projekt został zaprojektowany z myślą o łatwej nawigacji i intuicyjnym interfejsie.

## 🛠 Technologie
Projekt został zbudowany przy użyciu następujących technologii:
- **PHP** - Backend aplikacji, obsługa żądań HTTP i logiki biznesowej.
- **PostgreSQL** - Baza danych do przechowywania informacji o użytkownikach, filmach, komentarzach.
- **Docker** - Środowisko kontenerowe umożliwiające łatwe uruchamianie aplikacji.
- **Nginx** - Serwer HTTP obsługujący ruch sieciowy.
- **JavaScript** - Wspiera interaktywność strony
- **CSS** - Stylizacja interfejsu użytkownika.

## 🌐 Struktura Adresów

### `GET /main`
Strona główna forum, na której użytkownicy mogą zobaczyć:
- Karuzelę z polecanymi filmami i serialami.
- Listę kategorii filmowych.
- Nawigację do swojego profilu oraz możliwość wylogowania się.
<img src="https://github.com/user-attachments/assets/9eb51654-17a5-4272-9824-52fc4269f241" width="1000">

### `GET /category/{category_name}`
Widok wybranej kategorii filmowej, zawiera:
- Listę postów związanych z filmami i serialami z danej kategorii.
<img src="https://github.com/user-attachments/assets/668f9ca5-56ee-4d5a-a486-62a270507e25" width="1000">

- ### `GET /movie/{movie_id}`
Widok wybranego filmu, zawiera:
- Szczegółowe informacje filmu
- Możliwość dodawania własnych komentarzy do produkcji.
<img src="https://github.com/user-attachments/assets/24f3fa96-4ec9-4258-b006-29a3bec08d17" width="1000">

### `GET /profile/{user_id}`
Strona profilu użytkownika, gdzie można:
- Zobaczyć dane, aktualnie zalogowanego użytkownika
- Zmienić ustawienia konta.
<img src="https://github.com/user-attachments/assets/49096b77-87f4-44ae-b9f4-f99f9bc36c38" width="1000">

### `GET /login`
Strona logowania do systemu, umożliwiająca:
- Logowanie poprzez podanie danych użytkownika.
- Otrzymanie informacji o błędach uwierzytelnienia.
<img src="https://github.com/user-attachments/assets/a0201ffe-5ddf-4762-b76c-d25834b92c66" width="1000">

### `GET /register`
Formularz rejestracyjny, pozwalający na:
- Tworzenie nowego konta użytkownika.
- Walidację wprowadzanych danych.
<img src="https://github.com/user-attachments/assets/0c9666a3-9a1a-43ae-82cf-9f3f0d0680b0" width="1000">


## ⚙️ Instalacja
Aby uruchomić projekt lokalnie, wykonaj następujące kroki:

1. **Sklonuj repozytorium**:
   ```bash
   git clone https://github.com/uzytkownik/wewatch.git
   ```
2. **Uruchom Dockera**:
   ```bash
   docker-compose up --build
   ```
3. **Otwórz przeglądarkę** i przejdź do `http://localhost:8080`
4. **Domyślni użytkownicy** znajdują się w init.sql np.
   ```bash
   email: tomek123@test.com
   password: tomek123
   ```
## Diagram ERD
![ERD](https://github.com/user-attachments/assets/1cea9c95-1305-4234-8433-66a724b2fdcb)


## 👥 Autorzy
- **Tomasz Gierat** 


