-- Stap: 01
-- =====================================================================================
-- Doel : Maak een nieuwe database aan met de naam MVC_Basics_2509AB
--
--   Versie       Datum        Auteur                 Omschrijving
--   ------       --------     ----------------       -----------------------------
--     01         10-02-2026   Arjan de Ruijter       Smartphones
-- =====================================================================================

-- Verwijder database MVC_Basics_2509AB
DROP DATABASE IF EXISTS MVC_Basics_2509AB;

-- Maak een nieuwe database aan
CREATE DATABASE MVC_Basics_2509AB;

-- Gebruik database MVC_Basics_2509AB
USE MVC_Basics_2509AB;

-- Stap: 02
-- =====================================================================================
-- Doel : Maak een nieuwe tabel aan met de naam Smartphones
--
--   Versie       Datum        Auteur                 Omschrijving
--   ------       --------     ----------------       -------------------------
--     01         10-02-2026   Arjan de Ruijter       Tabel Smartphones
-- =====================================================================================

-- Onderstaande velden toevoegen aan de tabel Smartphones
-- Merk, Model, Prijs, Geheugen, Besturingssysteem,
-- Schermgrootte, Releasedatum, MegaPixels
-- =====================================================================================

CREATE TABLE Smartphones
(
    Id                      SMALLINT        UNSIGNED      NOT NULL    AUTO_INCREMENT,
    Merk                    VARCHAR(50)                   NOT NULL,
    Model                   VARCHAR(50)                   NOT NULL,
    Prijs                   DECIMAL(6,2)                  NOT NULL,
    Geheugen                DECIMAL(4,0)                  NOT NULL,
    Besturingssysteem       VARCHAR(25)                   NOT NULL,
    Schermgrootte           DECIMAL(3,1)                  NOT NULL,
    Releasedatum            DATE                          NOT NULL,
    MegaPixels              DECIMAL(3,0)                  NOT NULL,
    Aangemaakt              DATETIME                      NOT NULL    DEFAULT NOW(),
    Opmerkingen             VARCHAR(255)                  NULL,
    DatumAangemaakt         DATETIME                      NOT NULL    DEFAULT NOW(),
    DatumGewijzigd          DATETIME                      NULL        DEFAULT NOW(),
    CONSTRAINT PK_Smartphones_Id PRIMARY KEY (Id)
) ENGINE=InnoDB;
-- Stap: 03
-- =====================================================================================
-- Doel : Vul de tabel Smartphones met gegevens
--
--   Versie       Datum        Auteur                 Omschrijving
--   ------       --------     ----------------       -----------------------------
--     01         10-02-2026   Arjan de Ruijter       Vulling Smartphones
-- =====================================================================================

INSERT INTO Smartphones
(
    Merk
    ,Model
    ,Prijs
    ,Geheugen
    ,Besturingssysteem
    ,Schermgrootte
    ,Releasedatum
    ,MegaPixels
)
VALUES
('Apple',   'iPhone 16 Pro',         1256.56, 64,  'iOS 18',      6.7, '2025-01-19', 50),
('Samsung', 'Galaxy S25 Ultra',      1539.12, 128, 'Android 15',  6.1, '2025-02-01', 200),
('Google',  'Pixel 9 Pro',            890.00, 1024,'Android 15',  6.3, '2024-12-20', 100),
('OnePlus', 'OnePlus 13 Pro',         999.00, 256, 'Android 15',  6.8, '2025-03-10', 108),
('Xiaomi',  'Xiaomi 15 Ultra',         899.50, 512, 'HyperOS',     6.7, '2025-04-05', 120),
('Sony',    'Xperia 1 VI',             799.99, 256, 'Android 14',  6.5, '2024-09-30', 48),
('Huawei',  'P70 Pro',                 949.00, 512, 'HarmonyOS 4', 6.6, '2025-01-25', 150),
('Motorola','Moto Edge 50 Pro',        699.00, 256, 'Android 15',  6.7, '2025-02-15', 50);
-- Step: 04
/***************************************************************************************************************************************
- Doel : Maak een nieuwe tabel aan met de naam Sneakers
****************************************************************************************************************************************
Versie       Datum          Auteur                  Omschrijving
---------    ------------    ------------------      -------------------------
01           18-02-2026      Arjan de Ruijter         Tabel Sneakers
****************************************************************************************************************************************

Onderstaande velden toevoegen aan de tabel Sneakers
- Type (Hardloop, Basketbal, Casual), Prijs, Materiaal (Leer, Mesh, Synthetisch), Gewicht, Releasedatum
****************************************************************************************************************************************/

CREATE TABLE Sneakers
(
    Id                SMALLINT        UNSIGNED      NOT NULL    AUTO_INCREMENT,
    Merk              VARCHAR(50)                   NOT NULL,
    Model             VARCHAR(50)                   NOT NULL,
    Type              VARCHAR(50)                   NOT NULL,
    IsActief          BIT                           NOT NULL    DEFAULT 1,
    Omschrijving      VARCHAR(255)                  NOT NULL    DEFAULT NULL,
    DatumAangemaakt   DATETIME(6)                   NOT NULL    DEFAULT NOW(6),
    DatumGewijzigd    DATETIME(6)                   NOT NULL    DEFAULT NOW(6),
    CONSTRAINT PK_Smartphones_Id PRIMARY KEY (Id)
) ENGINE=InnoDB;

/***************************************************************************************************************************************
-- Step: 05
-- Doel : Vul de tabel Sneakers met gegevens
****************************************************************************************************************************************
Versie       Datum          Auteur                  Omschrijving
---------    ------------    ------------------      -------------------------
01           18-02-2026      Arjan de Ruijter         Vulling Sneakers
****************************************************************************************************************************************/

INSERT INTO Sneakers
(
    Merk,
    Model,
    Type
)
VALUES
    ('Nike', 'Air Jordan 1', 'Hardloop'),
    ('Adidas', 'Yeezy Boost 350', 'Basketbal'),
    ('New Balance', 'Pixel Pro 99', 'Hardloop'),
    ('Puma', 'Neo Age', 'Casual'),
    ('Overlord', 'Tristar 6', 'Hardloop');
    ('Asics', 'Gel Nimbus 26', 'Hardloop'),
    ('Reebok', 'Club C 85', 'Casual'),
    ('Jordan', 'Why Not Zero 5', 'Basketbal');
    -- Step: 06
/***************************************************************************************************************************************
-- Doel : Maak een nieuwe tabel aan met de naam Horloges
****************************************************************************************************************************************
Versie       Datum          Auteur                  Omschrijving
---------    ------------    ------------------      -------------------------
01           11-02-2026      Arjan de Ruijter         Tabel Horloges
****************************************************************************************************************************************

Onderstaande velden toevoegen aan de tabel Horloges
- Materiaal (Goud, Diamant, RVS), Gewicht, Releasedatum, Waterdichtheid(m), Type (Analoog, Digitaal),
- Uniek kenmerk
****************************************************************************************************************************************/

CREATE TABLE Horloges
(
    Id                SMALLINT        UNSIGNED      NOT NULL    AUTO_INCREMENT,
    Merk              VARCHAR(50)                   NOT NULL,
    Model             VARCHAR(50)                   NOT NULL,
    Prijs             DECIMAL(6,0)                 NOT NULL,
    IsActief          BIT                           NOT NULL    DEFAULT 1,
    Omschrijving      VARCHAR(255)                  NOT NULL    DEFAULT NULL,
    DatumAangemaakt   DATETIME(6)                   NOT NULL    DEFAULT NOW(6),
    DatumGewijzigd    DATETIME(6)                   NOT NULL    DEFAULT NOW(6),
    CONSTRAINT PK_Horloges_Id PRIMARY KEY (Id)
) ENGINE=InnoDB;

-- Step: 07
/***************************************************************************************************************************************
-- Doel : Vul de tabel Horloges met gegevens
****************************************************************************************************************************************
Versie       Datum          Auteur                  Omschrijving
---------    ------------    ------------------      -------------------------
01           11-02-2026      Arjan de Ruijter         Vulling Horloges
****************************************************************************************************************************************/

INSERT INTO Horloges
(
    Merk,
    Model,
    Prijs
)
VALUES
    ('Rolex', 'Daytona 126500LN', 19800),
    ('Omega', 'Speedmaster Moonwatch Professional', 8500),
    ('Vacheron Constantin', 'Overseas Perpetual Calendar Ultra-Thin', 98000),
    ('Jaeger-LeCoultre', 'Reverso Tribute Duoface', 17000);
``
