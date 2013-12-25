function callBackTestFunction(data) {
    alert(data);
}

// Pass
__post('/social/twitter_follow', {'username': 'rachit', 'password': 'password123'}, callBackTestFunction);

// Fail
__get('/social/twitter_follow', {'username': 'rachit', 'password': 'password123'}, callBackTestFunction);

// Fail
__get('/login/user', {'username': 'rachit', 'password': 'password123'}, callBackTestFunction);

// Fail - Because this forms url with &rachit=password123
__get('/login/user', {'rachit': 'password123'}, callBackTestFunction);

// Pass
__get('/login/user/rachit/password123', [], callBackTestFunction);

// Pass
__post('/login/user/rachit/password123', {'username': 'rachit', 'password': 'password123'}, callBackTestFunction);

// Fail
__post('/login/user/', {'username': 'rachit', 'password': 'password123'}, callBackTestFunction);
    