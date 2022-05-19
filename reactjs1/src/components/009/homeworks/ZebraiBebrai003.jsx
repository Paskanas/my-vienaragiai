const ZebraiBebrai003 = (props) => {
  return (
    <h1
      style={{
        color:
          props.color === 1
            ? 'blue'
            : props.color === 2
            ? 'red'
            : 'black',
      }}
    >
      Zebrai ir Bebrai
    </h1>
  );
};

export default ZebraiBebrai003;
