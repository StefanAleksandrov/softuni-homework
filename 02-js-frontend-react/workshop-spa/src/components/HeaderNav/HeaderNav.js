import { NavLink } from 'react-router-dom';

import './HeaderNav.css';

export default function HeaderNav() {
    let navLinks = '';
    let condition = false;

    if (condition) {
        navLinks = (
            <>
                <li>Welcome, User!</li>
                <li><NavLink to="/logout"><i className="fas fa-sign-out-alt"></i> Logout</NavLink></li>
            </>
        )
    } else {
        navLinks = (
            <>
                <li><NavLink to="/register"><i className="fas fa-user-plus"></i> Register</NavLink></li>
                <li><NavLink to="/login"><i className="fas fa-sign-in-alt"></i> Login</NavLink></li>
            </>
        )

    }
    return (
        <header id="site-header">
            <nav className="navbar">
                <section className="navbar-dashboard">
                    <div className="first-bar">
                        <NavLink to="/dashboard">Dashboard</NavLink>
                        <NavLink className="button" to="/my-pets">My Pets</NavLink>
                        <NavLink className="button" to="/create">Add Pet</NavLink>
                    </div>
                    <div className="second-bar">
                        <ul>
                            {navLinks}
                        </ul>
                    </div>
                </section>
            </nav>
        </header>
    )
}