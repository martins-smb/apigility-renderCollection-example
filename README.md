# Apigility renderCollection Example
Example of a APIGILITY REST API with renderCollection.entity.

### SQL Sample Schema
data/db_sample_schema.sql

### DB Adapter Config
config/autoload/user.global.php

```
'db' => array(
                'driver' => 'Pdo',
                'dsn' => 'mysql:dbname=dbname;host=localhost',
                'username' => 'username',
                'password' => 'password',
                'driver_options' => array(
                        PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES \'UTF8\''
                )
        ),
```

### Test on the postman
GET
http://localhost:8080/client

```
{
    "_links": {
        "self": {
            "href": "http://localhost:8080/client?page=1"
        },
        "first": {
            "href": "http://localhost:8080/client"
        },
        "last": {
            "href": "http://localhost:8080/client?page=1"
        }
    },
    "_embedded": {
        "client": [
            {
                "cl_id": "0001",
                "cl_name": "Test Client 1",
                "contacts": [
                    {
                        "ctc_id": "1",
                        "ctc_name": Carlos,
                        "ctc_email": "carlos@mail.com"
                    },
                    {
                        "ctc_id": "2",
                        "ctc_name": Vanessa,
                        "ctc_email": "vanessa@mail.com"
                    }
                ],
                "_links": {
                    "self": {
                        "href": "http://localhost:8080/client"
                    }
                }
            },
            {
                "cl_id": "0002",
                "cl_name": "Test Client 2",
                "contacts": [
                    {
                        "ctc_id": "3",
                        "ctc_name": Igor,
                        "ctc_email": "igor@mail.com"
                    },
                    {
                        "ctc_id": "4",
                        "ctc_name": Ivaneide,
                        "ctc_email": "ivaneide@mail.com"
                    }
                ],
                "_links": {
                    "self": {
                        "href": "http://localhost:8080/client"
                    }
                }
            }
        ]
    },
    "page_count": 1,
    "page_size": 5,
    "total_items": 2,
    "page": 1
}
```
