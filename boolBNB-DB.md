# USER

| COLONNA   | TIPO        | ATTRIBUTI        |
| --------- | ----------- | ---------------- |
| ID        | bigInt      | PRIMARY KEY, A_I |
| NAME      | varchar(50) | NULLABLE         |
| LAST NAME | varchar(50) | NULLABLE         |
| EMAIL     | varchar(50) | NOT NULL         |
| DoB       | varchar(50) | NULLABLE         |
| OWNER     | boolean     | DEFAULT(0)       |

# APARTMENTS

| COLONNA         | TIPO        | ATTRIBUTI        |
| --------------- | ----------- | ---------------- |
| ID              | bigInt      | PRIMARY KEY, A_I |
| USER_ID         | bigInt      | NOT NULL         |
| PREMIUM_PLAN_ID | bigInt      | NULLABLE         |
| FEATURED        | BOOLEAN     | DEFAULT (0)      |
| DESCRIPTION     | Description | NULLABLE         |
| ROOMS           | INTERGER    | NOT NULL         |
| SQMETERS        | varchar(50) | NULLABLE         |
| BEDS            | INTEGER     | NOT NULL         |
| BATHROOMS       | INTEGER     | NOT NULL         |
| ADDRESS         | STRING      | NOT NULL         |
| IMAGES          | STRING      | NULLABLE         |

# APARTMENT_PREMIUMPLAN

| COLONNA         | TIPO   | ATTRIBUTI        |
| --------------- | ------ | ---------------- |
| ID              | bigInt | PRIMARY KEY, A_I |
| APARTMENT_ID    | bigInt | NOT NULL         |
| PREMIUM_PLAN_ID | bigInt | NOT NULL         |
| STARTDATE       | date   | NOT NULL         |
| ENDDATE         | date   | NOT NULL         |

# EXTRA

| COLONNA       | TIPO    | ATTRIBUTI        |
| ------------- | ------- | ---------------- |
| ID            | bigInt  | PRIMARY KEY, A_I |
| APARTMENTS_ID | bigInt  | NOT NULL         |
| WI-FI         | BOOLEAN | NULLABLE         |
| PARKING       | BOOLEAN | NULLABLE         |
| SEAVIEW       | BOOLEAN | NULLABLE         |
| LAUNDRY       | BOOLEAN | NULLABLE         |
| PETS          | BOOLEAN | NULLABLE         |

# MESSAGES_USER_APARTMENT

| COLONNA               | TIPO   | ATTRIBUTI        |
| --------------------- | ------ | ---------------- |
| ID                    | bigInt | PRIMARY KEY, A_I |
| SENDER_ID (USER_ID)   | bigInt | NOT NULL         |
| RECEIVER_ID (USER_ID) | bigInt | NOT NULL         |
| APARTMENTS_ID         | bigInt | NOT NULL         |

# MESSAGES

| COLONNA | TIPO        | ATTRIBUTI        |
| ------- | ----------- | ---------------- |
| ID      | bigInt      | PRIMARY KEY, A_I |
| TEXT    | Description | NOT NULL         |
| TIME    | date        | NOT NULL         |

# PREMIUMPLANS

| COLONNA   | TIPO   | ATTRIBUTI        |
| --------- | ------ | ---------------- |
| ID        | bigInt | PRIMARY KEY, A_I |
| PLAN_NAME | bigInt | PRIMARY KEY, A_I |
| PRICE     | string | NOT NULL         |
| STARTDATE | date   | NOT NULL         |
| ENDDATE   | date   | NOT NULL         |

# GRAPHDATA

| COLONNA      | TIPO   | ATTRIBUTI        |
| ------------ | ------ | ---------------- |
| ID           | bigInt | PRIMARY KEY, A_I |
| USER_ID      | bigInt | NOT NULL         |
| APARTMENT_ID | bigInt | NOT NULL         |
| VIEWSCOUNT   | Int    | NOT NULL         |
| DATE         | date   | NOT NULL         |
