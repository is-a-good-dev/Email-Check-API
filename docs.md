# Documentation
Documentation for the email checking API. 

## Endpoints
There is only one endpoint on the API. This is email. 

The endpoint takes an email as an argument then returns whether the email is valid or not with relevent information. 

## Data
| Data                    | Description                                 |
|-------------------------|---------------------------------------------|
| status | API response code |
| message | Response message |
| data array | Array to hold all the data returned |
| valid_format | Returns a bool based on email format |
| data > disposable_email | Returns a bool for disposable email check   |
| data > mx_record_count | Returns the number of MX records found on dns check|
| data > mx_records > | Array of MX records if any |
| valid | Returns bool on all email checks |
| reason | Array of reasons if email wasnt valid|