const Hello = ({
  color,
  size,
  value,
}) => {
  return (
    <h1
      style={{
        color: color,
        fontSize: size * 3 + 'px',
      }}
    >
      Labas rytas Lietuva {value + 11}
    </h1>
  );
};

export default Hello;
