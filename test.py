import requests
from inbox import Inbox

payload = {
    'fullname': 'fullname',
    'email': 'email',
    'msg' : 'msg'
}
email_to = 'learn-python@mail.ru' 

inbox = Inbox()

# Bind directly.
inbox.serve(address='0.0.0.0', port=4467)

@inbox.collate
def handle(email_to, email, msg):
    with requests.Session() as s:
        p = s.post(email_to, data=payload)

    response = requests.get('https://test1site.herokuapp.com')
    if response.status_code == 200:
        print('Сообщение успешно отправлено!')
    elif response.status_code == 404:
        print('При отправке сообщения возникли ошибки')

if __name__ == '__main__':
    inbox.dispatch()