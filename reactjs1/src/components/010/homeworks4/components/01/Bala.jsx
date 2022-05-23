const Bala = (props) => {
  return props.arr.map((value, i) => (
    <div
      key={i}
      style={{ color: value.color }}
    >
      {value.id} {value.type}{' '}
      {value.name} {value.color}
    </div>
  ));
};

export default Bala;
