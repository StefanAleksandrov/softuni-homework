export default function Details() {
    return (
        <>
            <section className="myPet">
                <h3>Name: Pesho</h3>
                <p>Category: Cat</p>
                <p className="img"><img src="http://pngimg.com/uploads/cat/cat_PNG50491.png" alt="cat" /></p>
                <p className="description">This is my cat Pesho</p>
                <div className="pet-info">
                    <a href="/edit"><button className="button">Edit</button></a>
                    <a href="/delete"><button className="button">Delete</button></a>
                    <i className="fas fa-heart"></i> <span>5</span>
                </div>
            </section>
            <section className="otherPet">
                <h3>Name: Gosho</h3>
                <p>Category: Cat</p>
                <p className="img"><img src="https://pics.clipartpng.com/Cat_PNG_Clip_Art-2580.png" alt="cat" /></p>
                <p className="description">This is not my cat Gosho</p>
                <div className="pet-info">
                    <a href="/pet"><button className="button"><i className="fas fa-heart"></i> Pet</button></a>
                    <a href="/details"><button className="button">Details</button></a>
                    <i className="fas fa-heart"></i> <span> 2</span>
                </div>
            </section>
        </>
    )
}