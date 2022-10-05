# Documentation

## Endpoints
There is only one endpoint on the API. This is the email endpoint.

The endpoint takes an email as an argument then returns whether the email is valid or not with relevent information. 

## Data
| Data | Description |
|-|-|
| status | API Response Code |
| message | Response message |
| data array | All data returned |
| valid_format | Returns a boolean based on email format |
| data > disposable_email | Returns a boolean for disposable email check  |
| data > mx_record_count | Returns the number of MX records found on DNS check |
| data > mx_records > | Array of MX records |
| valid | Returns bool on all email checks |
| reason | Array of reasons if email isn't valid |
