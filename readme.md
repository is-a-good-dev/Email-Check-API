# Email checking api 

API created to check emails for mx-records, format, deliverability and to make sure its valid. 

http://email-check.ext.talosbot.xyz/?key=keygoeshere&email=will@is-a-good.dev

[test endpoint](http://email-check.ext.talosbot.xyz/test.php?action=testres)

Endpoints:

- key **~required**
- email **~required**

Email is to pass in the user email 
Key is required to keep this private. **Key must be kept in gh secrets**
