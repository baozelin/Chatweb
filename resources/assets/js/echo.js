
import Event from './event';


// listens to this event
Echo.join('chat')
    .here(users => {
        console.log(users);
        Event.$emit('users.here', users);
    })
    .joining(user => {
        console.log(user);
        Event.$emit('users.joined', user);
    })
    .leaving(user => {
        console.log(user);
        Event.$emit('users.left', user);
    })
    .listen('MessageCreated', (data) => {
        Event.$emit('added_message', data.message);
    })