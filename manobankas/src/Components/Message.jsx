const Message = ({ message }) => {
  return (
    <h2 className={message[1]}>
      {message[0]}
    </h2>
  );
};

export default Message;
